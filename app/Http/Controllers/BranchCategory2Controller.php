<?php

namespace App\Http\Controllers;
use App\Models\BranchCategory1;
use App\Models\BranchCategory2;
use App\Models\Branch;
use Illuminate\Http\Request;
use Carbon\Carbon;
class BranchCategory2Controller extends Controller
{
    public function index(Request $request){
        $parent = BranchCategory1::get();
        $keyword = $request->search ?? false;
        if($request->search){
            $data = BranchCategory2::where('name', 'LIKE', "%{$request->search}%")->paginate(10);
        }
        else{
        $data = BranchCategory2::with('parent')->orderby('number','asc')->orderby('id','desc')->paginate(10);
        }
        return view('be.branch_category_2.index',compact('data','parent','keyword'));
    }
    public function add(){
        $parent = BranchCategory1::get();
        return view('be.branch_category_2.create',compact('parent'));
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
            'slug' => "required|unique:branch_category2s,slug"
        ],$trans);

        $data = new BranchCategory2();
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data = new BranchCategory2();
        $data->name = $request->name;
        $data->parent_id = $request->parent_id ?? true;
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
        return redirect()->route('be.branch_category_2.index');
    }
    public function edit($id){
        $parent = BranchCategory1::get();
        $data = BranchCategory2::find($id);
        return view('be.branch_category_2.edit',compact('data','parent'));
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
            'slug' => "required|unique:branch_category2s,slug,$id,id"
        ],$trans);

        $data = BranchCategory2::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->parent_id = $request->parent_id;
        $link = Branch::where('parent_child_id',$id)->get();
            foreach($link as $l){
                $l->parent_id = $request->parent_id;
                $l->save();
            }
        $data->hideshow = $request->hideshow;
        $data->featured = $request->featured ?? $data->featured;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->slug = $request->slug;
        $data->title_seo = $request->title_seo;
        $data->keyword_seo = $request->keyword_seo;
        $data->description_seo = $request->description_seo;
        $data->img = $filename ?? $data->img;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.branch_category_2.index');
    }
    public function clone($id,Request $request){
        $data = BranchCategory2::find($id);
        $newdata = $data->replicate();
        $newdata->created_at = Carbon::now();
        $newdata->save();
        alert()->success('Thành công','Đã copy dữ liệu');
        return redirect()->route('be.branch_category_2.index');
    }
    public function destroy($id){
        $data = BranchCategory2::find($id);
        $data->delete();
        $data->children()->delete();
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'placeholder.png' && $data->img != NULL) {
            unlink($path);
        }
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.branch_category_2.index');
    }

    public function featured(Request $request){
        $data = BranchCategory2::find($request->id);
        $data->featured = $request->featured;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
    public function hideshow(Request $request){
        $data = BranchCategory2::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = BranchCategory2::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }


    public function update_parent(Request $request){
        $id_flink_child_parent = $request->id_flink_child_parent;
        $id_parent = $request->id_parent;
        $data = BranchCategory2::find($id_flink_child_parent);
        $data->parent_id = $id_parent;
        $branch = Branch::where('parent_child_id',$id_flink_child_parent)->get();
        $data->save();
        foreach($branch as $p){
            $p->parent_id = $request->id_parent;
            $p->save();
        }
    }
}
