<?php
namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $data = About::orderby('number','asc')->orderby('id','desc')->get();
        return view('be.about.index',compact('data'));
    }
    public function add(){
        return view('be.about.create');
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
            'slug' => "required|unique:policies,slug"
        ],$trans);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data = new About();
        $data->name = $request->name;
        $data->number = $request->number ?? true;
        $data->featured = $request->featured;
        $data->hideshow = $request->hideshow;
        $data->content = $request->content;
        $data->description = $request->description;
        $data->slug = $request->slug;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->img = $filename ?? 'placeholder.png';
        $data->save();
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.about.index');
    }

    public function edit($id){
        $data = About::find($id);
        return view('be.about.edit',compact('data'));
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
            'slug' => "required|unique:policies,slug,$id,id"
        ],$trans);
        $data = About::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->parent_id = $request->parent_id;
        $data->featured = $request->featured;
        $data->hideshow = $request->hideshow;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->slug = $request->slug;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->img = $filename ?? $data->img;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.about.index');
    }
    public function destroy($id){
        $data = About::find($id);
        $data->delete();
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'placeholder.png' && $data->img != NULL) {
            unlink($path);
        }
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.about.index');
    }

    public function featured(Request $request){
        $data = About::find($request->id);
        $data->featured = $request->featured;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
    public function hideshow(Request $request){
        $data = About::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = About::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
}
