<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index(){
        $data = Slide::orderby('number','asc')->orderby('id','desc')->get();
        return view('be.slide.index',compact('data'));
    }
    public function add(){
        return view('be.slide.create');
    }
    public function store(Request $request){
        $trans = [
            'name.required' => 'Tên đang bỏ trống !',
            'name.max' => 'Tên quá dài !',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
        ],$trans);
        $data = new Slide();
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->content = $request->content;
        $data->number = $request->number ?? true;
        $data->hideshow = $request->hideshow ;
        $data->img = $filename ?? 'placeholder.png';
        $data->save();
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.slide.index');
    }
    public function edit($id){
        $data = Slide::find($id);
        return view('be.slide.edit',compact('data'));
    }
    public function update($id,Request $request){
        $trans = [
            'name.required' => 'Tên khóa học đang bỏ trống !',
            'name.max' => 'Tên khóa học quá dài !',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
        ],$trans);

        $data = Slide::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        $data->name = $request->name;
        $data->content = $request->content;
        $data->number = $request->number ?? true;
        $data->hideshow = $request->hideshow ?? true;
        $data->img = $filename ?? $data->img;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.slide.index');
    }
    public function destroy($id){
        $data = Slide::find($id);
        $data->delete();
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'placeholder.png' && $data->img != NULL) {
            unlink($path);
        }
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.slide.index');
    }

    public function hideshow(Request $request){
        $data = Slide::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = Slide::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
}
