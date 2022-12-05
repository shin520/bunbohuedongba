<?php

namespace App\Http\Controllers;
use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function index(){
        $data = FeedBack::orderby('number','asc')->orderby('id','desc')->get();
        return view('be.feedback.index',compact('data'));
    }
    public function add(){
        return view('be.feedback.create');
    }
    public function store(Request $request){
        $trans = [
            'name.required' => 'Tên khách hàng đang bỏ trống !',
            'name.max' => 'Tên khách hàng quá dài !',
            'img.image' => 'Chỉ được upload hình ảnh',
            'img.mimes'=> 'Định dạng cho phép là jpeg, png, jpg, gif, svg',
            'img.max' => 'Kích thước ảnh tối đa là 5MB',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],$trans);
        $data = new FeedBack();
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->number = $request->number ?? true;
        $data->url = $request->url;
        $data->featured = $request->featured;
        $data->hideshow = $request->hideshow;
        $data->img = $filename ?? 'placeholder.png';
        $data->save();
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.feedback.index');
    }
    public function edit($id){
        $data = FeedBack::find($id);
        return view('be.feedback.edit',compact('data'));
    }
    public function update($id,Request $request){
        $trans = [
            'name.required' => 'Tên khách hàng đang bỏ trống !',
            'name.max' => 'Tên khách hàng quá dài !',
            'img.image' => 'Chỉ được upload hình ảnh',
            'img.mimes'=> 'Định dạng cho phép là jpeg, png, jpg, gif, svg',
            'img.max' => 'Kích thước ảnh tối đa là 5MB',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],$trans);

        $data = FeedBack::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->description = $request->description;
        $data->content = $request->content;
        $data->number = $request->number ?? $data->number;
        $data->url = $request->url;
        $data->featured = $request->featured ?? $data->featured;
        $data->hideshow = $request->hideshow;
        $data->img = $filename ?? $data->img;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.feedback.index');
    }
    public function clone($id,Request $request){
        $data = FeedBack::find($id);
        $newdata = $data->replicate();
        $newdata->created_at = Carbon::now();
        $newdata->save();
        alert()->success('Thành công','Đã copy dữ liệu');
        return redirect()->route('be.feedback.index');
    }
    public function destroy($id){
        $data = FeedBack::find($id);
        $data->delete();
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'placeholder.png' && $data->img != NULL) {
            unlink($path);
        }
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.feedback.index');
    }

    public function featured(Request $request){
        $data = FeedBack::find($request->id);
        $data->featured = $request->featured;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
    public function hideshow(Request $request){
        $data = FeedBack::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = FeedBack::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
}
