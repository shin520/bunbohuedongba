<?php

namespace App\Http\Controllers;
use App\Models\StaticContent;
use Illuminate\Http\Request;

class StaticContentController extends Controller
{
    public function index(){
        $data = StaticContent::orderby('number','asc')->orderby('id','desc')->get();
        return view('be.static_content.index',compact('data'));
    }
    public function add(){
        return view('be.static_content.create');
    }
    public function store(Request $request){
        $trans = [
            'name.required' => 'Tên khóa học đang bỏ trống !',
            'name.max' => 'Tên khóa học quá dài !',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
        ],$trans);
        $data = new StaticContent();
        $data->name = $request->name;
        $data->content = $request->content;
        $data->number = $request->number ?? true;;
        $data->save();
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.static_content.index');
    }
    public function edit($id){
        $data = StaticContent::find($id);
        return view('be.static_content.edit',compact('data'));
    }
    public function update($id,Request $request){
        $trans = [
            'name.required' => 'Tên khóa học đang bỏ trống !',
            'name.max' => 'Tên khóa học quá dài !',
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
        ],$trans);

        $data = StaticContent::find($id);
        $data->name = $request->name;
        $data->content = $request->content;
        $data->number = $request->number ?? true;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.static_content.index');
    }
    public function destroy($id){
        $data = StaticContent::find($id);
        $data->delete();
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'placeholder.png' && $data->img != NULL) {
            unlink($path);
        }
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.static_content.index');
    }

    public function hideshow(Request $request){
        $data = StaticContent::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = StaticContent::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
}
