<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\GalleryType;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Helper\Uploader;

class GalleryController extends Controller
{
    public function index(){
        $data = Gallery::orderby('number','asc')->orderby('id','desc')->get();
        return view('be.gallery.index',compact('data'));
    }
    public function add(){
        $parent = GalleryType::orderby('number','asc')->orderby('id','desc')->where('hideshow','1')->get();
        return view('be.gallery.create',compact('parent'));
    }
    public function store(Request $request){
        $trans = [
            'name.required' => 'Tên thư vện ảnh đang bỏ trống !',
            'name.max' => 'Tên thư vện ảnh quá dài !',
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
            'slug' => "required|unique:galleries,slug"
        ],$trans);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data = new Gallery();
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
        $data->save();
        if($request->images){
            foreach ($request->images as $image) {
                $image_detail = new GalleryImage();
                $image_detail-> image = $image;
                $image_detail-> gallery_id = $data->id;
                $image_detail->save();
            }
            }
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.gallery.index');
    }
    public function edit($id){
        $parent = GalleryType::orderby('number','asc')->orderby('id','desc')->where('hideshow','1')->get();
        $data = Gallery::find($id);
        return view('be.gallery.edit',compact('data','parent'));
    }
    public function update($id,Request $request){
        $trans = [
            'name.required' => 'Tên thư vện ảnh đang bỏ trống !',
            'name.max' => 'Tên thư vện ảnh quá dài !',
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
            'slug' => "required|unique:galleries,slug,$id,id"
        ],$trans);
        $data = Gallery::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
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
        $data->save();
        if($request->images){
            foreach ($request->images as $image) {
                $image_detail = new GalleryImage();
                $image_detail-> image = $image;
                $image_detail-> gallery_id = $data->id;
                $image_detail->save();
            }
        }
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.gallery.index');
    }
    public function destroy($id){
        $data = Gallery::find($id);
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
        $data->delete();
        alert()->success('Thành công','Đã xóa !');
        return back();
    }

    public function featured(Request $request){
        $data = Gallery::find($request->id);
        $data->featured = $request->featured;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function hideshow(Request $request){
        $data = Gallery::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = Gallery::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }


        public function delete_all_image_detail(Request $request){
            $id = $request->id;
            $data = Gallery::find($id);
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
            $images = GalleryImage::whereIn('id',explode(",",$ids))->get();
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
        $image = GalleryImage::find($id);
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
