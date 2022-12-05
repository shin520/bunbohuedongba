<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory1;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ProductCategory1Controller extends Controller
{
    public function index(){
        $data = ProductCategory1::orderby('number','asc')->orderby('id','desc')->get();
        return view('be.product_category_1.index',compact('data'));
    }
    public function add(){
        return view('be.product_category_1.create');
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
            'slug' => "required|unique:product_category1s,slug"
        ],$trans);
        $data = new ProductCategory1();
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->slug = $request->slug;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->number = $request->number ?? true;
        $data->featured = $request->featured;
        $data->hideshow = $request->hideshow;
        $data->icon = $request->icon;
        $data->img = $filename ?? 'placeholder.png';
        $data->save();
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.product_category_1.index');
    }
    public function edit($id){
        $data = ProductCategory1::find($id);
        return view('be.product_category_1.edit',compact('data'));
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
            'slug' => "required|unique:product_category1s,slug,$id,id"
        ],$trans);

        $data = ProductCategory1::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->slug = $request->slug;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->featured = $request->featured;
        $data->hideshow = $request->hideshow;
        $data->icon = $request->icon;
        $data->img = $filename ?? $data->img;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.product_category_1.index');
    }
    public function clone($id,Request $request){
        $data = ProductCategory1::find($id);
        $newdata = $data->replicate();
        $newdata->created_at = Carbon::now();
        $newdata->save();
        alert()->success('Thành công','Đã copy dữ liệu');
        return redirect()->route('be.product_category_1.index');
    }
    public function destroy($id){
        $data = ProductCategory1::find($id);
        $data->delete();
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'placeholder.png' && $data->img != NULL) {
            unlink($path);
        }
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.product_category_1.index');
    }

    public function featured(Request $request){
        $data = ProductCategory1::find($request->id);
        $data->featured = $request->featured;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
    public function hideshow(Request $request){
        $data = ProductCategory1::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = ProductCategory1::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
}
