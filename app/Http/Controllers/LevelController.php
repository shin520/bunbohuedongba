<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    public function index(){
        $data = Level::orderby('number','asc')->orderby('id','desc')->get();
        return view('be.level.index',compact('data'));
    }
    public function add(){
        return view('be.level.create');
    }
    public function store(Request $request){
        $trans = [
            'name.required' => 'Tên không được bỏ trống !',
            'name.unique' => 'Tên này đã tồn tại trong hệ thống !',
            'exp.required' => 'Điểm số không được bỏ trống !',
            'exp.numeric' => 'Điểm số không thể là chữ'
        ];
        $validated = $request->validate([
            'name' => 'required|unique:levels|max:255',
            'exp' => 'required|numeric',
        ],$trans);

        $data = new Level();
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
            $data->img = $filename ?? 'placeholder.png';
        }
        $data->name = $request->name;
        $data->hideshow = $request->hideshow;
        // $data->number = $request->number;
        $data->content = $request->content;
        $data->exp = $request->exp;
        $data->save();
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.level.index');
    }
    public function edit($id){
        $data = Level::find($id);
        return view('be.level.edit',compact('data'));
    }
    public function update($id,Request $request){
        $data = Level::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
            $data->img = $filename ?? $data->img;
        }
        $data->name = $request->name;
        $data->hideshow = $request->hideshow;
        // $data->number = $request->number;
        $data->content = $request->content;
        $data->exp = $request->exp;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.level.index');
    }
    public function destroy($id){
        $data = Level::find($id);
        $data->delete();
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.level.index');
    }

    public function hideshow(Request $request){
        $data = Level::find($request->id);
        $data->hideshow = $request->hideshow;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function changenumber(Request $request){
        $data = Level::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
}
