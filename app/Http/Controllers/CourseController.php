<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\CourseType;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $data = Course::orderby('number','asc')->orderby('id','desc')->get();
        return view('be.course.index',compact('data'));
    }
    public function add(){
        $parent = CourseType::orderby('number','asc')->orderby('id','desc')->where('hideshow','1')->get();
        return view('be.course.create',compact('parent'));
    }
    public function store(Request $request){
        $trans = [
            'name.required' => 'Tên khóa học đang bỏ trống !',
            'name.max' => 'Tên khóa học quá dài !',
            'img.image' => 'Chỉ được upload hình ảnh',
            'img.mimes'=> 'Định dạng cho phép là jpeg, png, jpg, gif, svg',
            'img.max' => 'Kích thước ảnh tối đa là 5MB',
            'file.max'=> 'Kích thước tệp tối đa là 10MB',
            'file.mimes'=> 'Định dạng tệp cho phép là jpeg, png, jpg',
            'slug.required' => 'Đường dẫn không được để trống',
            'slug.unique' => 'Đường dẫn đã tồn tại',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'max:10240|mimes:zip,pdf,jpeg,png,jpg',
            'slug' => "required|unique:courses,slug"
        ],$trans);

        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        // if($request->file('file')){
        //     $file= $request->file('file');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file->storeAs('public/uploads', $filename);
        // }
        $data = new Course();
        $data->name = $request->name;
        $data->parent_id = $request->parent_id ?? true;
        $data->number = $request->number ?? true;
        $data->hideshow = $request->hideshow;
        $data->content = $request->content;
        $data->description = $request->description;
        $data->slug = $request->slug;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->img = $filename ?? 'placeholder.png';
        $data->file = $filename ?? '';
        $data->save();
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.course.index');
    }
    public function edit($id){
        $parent = CourseType::orderby('number','asc')->orderby('id','desc')->where('hideshow','1')->get();
        $data = Course::find($id);
        return view('be.course.edit',compact('data','parent'));
    }
    public function update($id,Request $request){
        $trans = [
            'name.required' => 'Tên khóa học đang bỏ trống !',
            'name.max' => 'Tên khóa học quá dài !',
            'img.image' => 'Chỉ được upload hình ảnh',
            'img.mimes'=> 'Định dạng cho phép là jpeg, png, jpg, gif, svg',
            'img.max' => 'Kích thước ảnh tối đa là 5MB',
            'file.max'=> 'Kích thước tệp tối đa là 10MB',
            'file.mimes'=> 'Định dạng tệp cho phép là jpeg, png, jpg',
            'slug.required' => 'Đường dẫn không được để trống',
            'slug.unique' => 'Đường dẫn đã tồn tại',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'max:10240|mimes:zip,pdf,jpeg,png,jpg',
            'slug' => "required|unique:courses,slug,$id,id"
        ],$trans);
        $data = Course::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        // if($request->file('file')){
        //     $file= $request->file('file');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file->storeAs('public/uploads', $filename);
        // }

        $data->name = $request->name;
        $data->parent_id = $request->parent_id;
        $data->hideshow = $request->hideshow;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->slug = $request->slug;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->img = $filename ?? $data->img;
        $data->file = $filename ?? '';
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.course.index');
    }
    public function destroy($id){
        $data = Course::find($id);
        $data->delete();
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'placeholder.png' && $data->img != NULL) {
            unlink($path);
        }
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.course.index');
    }

    public function hideshow(Request $request){
        $data = Course::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = Course::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
}
