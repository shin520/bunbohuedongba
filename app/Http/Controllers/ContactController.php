<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $data = Contact::where('type', 'contact')->orderby('number','asc')->orderby('id','desc')->get();
        return view('be.contact.index',compact('data'));
    }

    public function read(Request $request){
        $data = Contact::find($request->id);
        $data->read = $request->read;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function edit($id){
        $data = Contact::find($id);
        return view('be.contact.edit',compact('data'));
    }
    public function update($id,Request $request){
        $data = Contact::find($id);
        $data->read = $request->read;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return redirect()->route('be.contact.index');
    }

    public function number(Request $request){
        $data = Contact::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }

    public function destroy($id){
        $data = Contact::find($id);
        $data->delete();
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->back();
    }

}
