<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductCategory1;
use App\Models\ProductCategory2;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Str;
use File;

class ProductController extends Controller
{
    public function index(Request $request){
        $check = ProductImage::where('product_id',NULL)->get();
        if($check->count() > 0){
            foreach($check as $delete){
                $delete->delete();
            }
        }
        $parent = ProductCategory1::with('children')->orderby('number','asc')->orderby('id','desc')->where('hideshow','1')->get();
        $key_search = $request->search ?? '';
        if($request->search){
            $data = Product::where('name', 'LIKE', "%{$request->search}%")->paginate(10);
        }
        else{
            $data = Product::with('parent')->with('parent_child')->orderby('id','desc')->orderby('number','asc')->paginate(10);
        }
        return view('be.product.index',compact('data','parent','key_search'));
    }
    public function add(){
        $check = ProductImage::where('product_id',NULL)->get();
        foreach($check as $delete){
            $delete->delete();
        }
        $parent = ProductCategory1::orderby('number','asc')->orderby('id','desc')->where('hideshow','1')->get();
        return view('be.product.create',compact('parent'));
    }

    public function get_parent_child(Request $request){
    $id = $request->id;
    $output = '';
    if($id != 0){
        $data = ProductCategory1::find($id);
        $output.='<option value="">---Chọn danh mục con---</option>';
                    foreach ($data->children as $child){
                        $output.='<option value="'.$child->id.'">'.$child->name.'</option>';
                    }
    }else{
        $output.='<option value="">---Chọn danh mục con---</option>';
    }
    echo $output;
    }


    public function update_parent(Request $request){
        $id_flink = $request->id_flink;
        $id_parent = $request->id_parent;
        $flink = Product::find($id_flink)->update(['parent_id' => $id_parent,'parent_child_id' => NULL]);
        $output = '';
        if($id_parent != 0){
            $data = ProductCategory1::find($id_parent);
            $output.='<option value="">---Chọn danh mục con---</option>';
                        foreach ($data->children as $child){
                            $output.='<option data-parent-id="'.$data->id.'" value="'.$child->id.'">'.$child->name.'</option>';
                        }
        }else{
            $output.='<option value="">---Chọn danh mục con---</option>';
        }
        echo $output;
        }

    public function update_parent_child(Request $request){
        $id_flink = $request->id_flink;
        $id_parent_child = $request->id_parent_child;
        if(is_numeric($id_parent_child) == true ){
            $flink = Product::find($id_flink)->update(['parent_child_id' => $id_parent_child]);
        }else{
            $data = new ProductCategory2();
            $data->name = $id_parent_child;
            $data->parent_id = Product::find($id_flink)->parent_id ?? '';
            $data->slug = Str::slug($id_parent_child);
            $data->number = true;
            $data->hideshow = true;
            $data->featured = false;
            $data->description_seo = $id_parent_child;
            $data->title_seo = $id_parent_child;
            $data->keyword_seo = $id_parent_child;
            $data->save();
            $flink = Product::find($id_flink)->update(['parent_child_id' => $data->id]);
        }

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
            'slug' => "required|unique:products,slug"
        ],$trans);

        $data = new Product();
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $fake_price = Str::replace('.', '', $request->fake_price);
        $price = Str::replace('.', '', $request->price);
        if($fake_price > 0)
        {
            $data->fake_price = $fake_price ?? false;
            $data->discount =(100 - round(($price / ($fake_price)) * 100)) ?? false;
        }
        $data->name = $request->name;
        $data->parent_id = $request->parent_id ?? true;
        $data->parent_child_id = $request->parent_child_id;
        $data->price = $price ?? false;
        $data->slug = Str::slug($request->slug);
        $data->number = $request->number ?? true;
        $data->hideshow = $request->hideshow;
        $data->featured = $request->featured;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->product_code = $request->product_code;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->img = $filename ?? 'placeholder.png';
        $data->save();
        if($request->images){
        foreach ($request->images as $image) {
            $image_detail = new ProductImage();
            $image_detail-> image = $image;
            $image_detail->product_id = $data->id;
            $image_detail->save();
        }
        }
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.product.index');
    }
    public function edit($id){
        $parent = ProductCategory1::orderby('number','asc')->orderby('id','desc')->where('hideshow','1')->get();
        $data = Product::find($id);
        return view('be.product.edit',compact('data','parent'));
    }
    public function update($id,Request $request){

        $trans = [
            'name.required' => 'Tên sản phẩm đang bỏ trống !',
            'name.max' => 'Tên sản phẩm quá dài !',
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
            'slug' => "required|unique:products,slug,$id,id"
        ],$trans);

        $data = Product::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->parent_id = $request->parent_id;
        $data->slug = Str::slug($request->name);
        $data->parent_child_id = $request->parent_child_id;
        $data->hideshow = $request->hideshow ?? $data->hideshow;
        $data->featured = $request->featured ?? $data->featured ;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->img = $filename ?? $data->img;
        $data->save();
        if($request->images){
            foreach ($request->images as $image) {
                $image_detail = new ProductImage();
                $image_detail-> image = $image;
                $image_detail->product_id = $data->id;
                $image_detail->save();
            }
        }
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.product.index');
    }
    public function destroy($id){
        $data = Product::find($id);
        $data->delete();
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'placeholder.png' && $data->img != NULL) {
            unlink($path);
        }
        foreach($data->images as $image){
            $path = public_path().'/storage/uploads/'.$image->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $data->images()->delete();
        alert()->success('Thành công','Đã xóa !');
        return back();
    }

    public function hideshow(Request $request){
        $data = Product::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function featured(Request $request){
        $data = Product::find($request->id);
        $data->featured = $request->featured;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = Product::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function delete_all_image_detail(Request $request){
            $id = $request->id;
            $data = Product::find($id);
            foreach($data->images as $image){
                $path = public_path().'/storage/uploads/'.$image->image;
                if (file_exists($path)) {
                    unlink($path);
                }
                $image->delete();
            }
    }

    public function delete_multiple_image_detail(Request $request){
        $ids = $request->ids;
        $images = ProductImage::whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                $image_path = public_path().'/storage/uploads/'.$image->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $image->delete();
            }
        }
    }

    public function delete_single_image_detail(Request $request){
        $id = $request->id;
        $image = ProductImage::find($id);
        $path = public_path().'/storage/uploads/'.$image->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $image->delete();
}

    public function uploadImageViaAjax(Request $request)
    {
        $name = [];
        $original_name = [];
        foreach ($request->file('file') as $key => $value) {
            $image = uniqid() . time() . '.' . $value->getClientOriginalExtension();
            $destinationPath = public_path().'/storage/uploads/';
            $value->move($destinationPath, $image);
            $name[] = $image;
            $original_name[] = $value->getClientOriginalName();
        }
        return response()->json([
            'name'          => $name,
            'original_name' => $original_name
        ]);
    }


}
