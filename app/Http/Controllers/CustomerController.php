<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Level;
use Hash;
class CustomerController extends Controller
{
    public function index(Request $request){
        $levels=Level::orderby('number','asc')->get();
        $key_search = [
            'info' => $request->info ?? '',
            'level' => $request->level ?? '',
            'sort_number' =>$request->sort_number ?? '',
            'sort_info'=>$request->sort_info ?? '',
            'sort_rank' => $request->sort_rank ?? '',
            'sort_status' => $request->sort_status ?? '',
        ];
        if ($request->all()) {
            $query = User::query();
            $query->when(request('info'), function ($q) {
                return $q->where('name', 'LIKE', "%".request('info')."%")->Orwhere('address', 'LIKE', "%".request('info')."%")->Orwhere('email', 'LIKE', "%".request('info')."%")->Orwhere('phone', 'LIKE', "%".request('info')."%");
            });
            $query->when(request('level'), function ($q) {
                return $q->whereHas('wallet',function($z){
                    $z->where('level_id',request('level'));
                });
            });
            $query->when(request('sort_number'), function ($q) {
                return $q->orderby('number', request('sort_number'));
            });
            $query->when(request('sort_info'), function ($q) {
                return $q->orderby('created_at', request('sort_info'));
            });

            $query->when(request('sort_status'), function ($q) {
                return $q->orderby('status', request('sort_status'));
            });
            $data = $query->with('wallet')->where('type','customer')->paginate(10);
        } else {
            $data = User::with('wallet')->where('type','customer')->paginate(10);
        }
        return view('be.customer.index',compact('data','key_search','levels'));
    }
    public function add(){
        return view('be.customer.create');
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
            'slug' => "required|unique:users,slug"
        ],$trans);
        $data = new User();
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        if($request->file('file')){
            $file_info= $request->file('file');
            $file_infoname= date('YmdHi').$file_info->getClientOriginalName();
            $file_info->storeAs('public/uploads', $file_infoname);
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->number = $request->number ?? true;
        $data->status = $request->status;
        $data->birth = $request->birth;
        $data->password = Hash::make('password');
        $data->img = $filename ?? 'noavatar.png';
        $data->file = $file_infoname ?? '';
        $data->type = 'customer';
        $data->status = true;
        $data->save();
        $data->wallet()->create([
            'level_id' => Level::orderby('number','asc')->first()->id,
        ]);
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.customer.index');
    }
    public function edit($id){
        $data = User::FindOrFail($id);
        return view('be.customer.edit',compact('data'));
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
            'slug' => "required|unique:users,slug,$id,id"
        ],$trans);
        $data = User::find($id);
        if($request->file('img')){
            $file= $request->file('img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }
        if($request->file('file')){
            $file_info= $request->file('file');
            $file_infoname= date('YmdHi').$file_info->getClientOriginalName();
            $file_info->storeAs('public/uploads', $file_infoname);
        }
        $data->name = $request->name ?? $data->name;
        $data->phone = $request->phone ?? $data->phone;
        $data->address = $request->address ?? $data->address;
        $data->number = $request->number ?? $data->number;
        $data->status = $request->status ?? $data->status;
        $data->birth = $request->birth ?? $data->birth;
        $data->password = Hash::make($request->password);
        $data->img = $filename ?? $data->img;
        $data->file = $file_infoname ?? $data->file;
        $data->save();
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return back();
    }
    public function clone($id,Request $request){
        $data = User::find($id);
        $newdata = $data->replicate();
        $newdata->created_at = Carbon::now();
        $newdata->save();
        alert()->success('Thành công','Đã copy dữ liệu');
        return redirect()->route('be.customer.index');
    }
    public function destroy($id){
        $data = User::find($id);
        $path = public_path().'/storage/uploads/'.$data->img;
        if (file_exists($path) && $data->img != 'noavatar.png' && $data->img != NULL) {
            unlink($path);
        }
        $data->wallet()->delete();
        $data->delete();
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.customer.index');
    }
    public function status(Request $request){
        $data = User::find($request->id);
        $data->status = $request->status;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
    public function changenumber(Request $request){
        $data = User::find($request->id);
        $data->number = $request->number;
        $data->save();
        return response()->json(['success'=>'Đã cập nhật lại.']);
    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        $images = User::where('type','customer')->whereIn('id',explode(",",$ids))->get();
        if ($ids) {
            foreach($images as $image){
                $image_path = public_path().'/storage/uploads/'.$image->img;
                if (file_exists($image_path) && $image->img != 'noavatar.png') {
                    unlink($image_path);
                }
            }
        }
        $data = User::whereIn('id',explode(",",$ids));
        foreach ($data->get() as $item) {
            $item->wallet()->delete();
        }
        $data->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các mục đã chọn !']);
    }
}
