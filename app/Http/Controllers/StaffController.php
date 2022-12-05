<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Level;
use Hash;
use Auth;
use App\Models\HistoryLogin;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class StaffController extends Controller
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
        if ($request->info || $request->level || $request->sort_number || $request->sort_info || $request->sort_rank || $request->sort_status) {
            $query = User::query();
            $query->when(request('info'), function ($q) {
                return $q->where('name', 'LIKE', "%".request('info')."%")->Orwhere('address', 'LIKE', "%".request('info')."%")->Orwhere('email', 'LIKE', "%".request('info')."%")->Orwhere('phone', 'LIKE', "%".request('info')."%");
            });
            $query->when(request('level'), function ($q) {
                return $q->where('level_id', 'LIKE', "%".request('level')."%");
            });
            $query->when(request('sort_number'), function ($q) {
                return $q->orderby('number', request('sort_number'));
            });
            $query->when(request('sort_info'), function ($q) {
                return $q->orderby('created_at', request('sort_info'));
            });
            $query->when(request('sort_rank'), function ($q) {
                return $q->orderby('level_id', request('sort_rank'));
            });
            $query->when(request('sort_status'), function ($q) {
                return $q->orderby('status', request('sort_status'));
            });
            $data = $query->where('type','!=','customer')->paginate(10);
        } else {
            $data = User::orderby('id','desc')->where('type','!=','customer')->paginate(10);
        }
        return view('be.staff.index',compact('data','key_search','levels'));
    }



    public function add(){
        $roles = Role::orderby('id','asc')->get();
        return view('be.staff.create',compact('roles'));
    }
    public function store(Request $request){
        $trans = [
            'name.required' => 'Tên nhân viên đang bỏ trống !',
            'name.max' => 'Tên nhân viên quá dài !',
            'img.image' => 'Chỉ được upload hình ảnh',
            'img.mimes'=> 'Định dạng cho phép là jpeg, png, jpg, gif, svg',
            'img.max' => 'Kích thước ảnh tối đa là 2MB',
            'file.max'=> 'Kích thước tệp tối đa là 10MB',
            'file.mimes'=> 'Định dạng tệp cho phép là zip, pdf, jpeg, png, jpg',
            'email.email' => 'Email chưa đúng định dạng',
            'email.required' => 'Email không được bỏ trống',
            'email.unique' => 'Email đã tồn tại trong hệ thống'
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:users,email|email',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'max:10240|mimes:zip,pdf,jpeg,png,jpg'
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
        $data->password = Hash::make($request->password);
        $data->img = $filename ?? 'noavatar.png';
        $data->file = $file_infoname ?? '';
        $data->type = 'staff';
        $data->status = $request->status;
        $data->save();
        $data->assignRole($request->role);
        $activity = Activity::all()->last();
        $activity->description;
        $activity->subject;
        $activity->changes;
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.staff.index');
    }
    public function edit($id){
        $roles = Role::orderby('id','asc')->get();
        $data = User::FindOrFail($id);
        $history_login = HistoryLogin::where('id_user',$id)->paginate(10);
        return view('be.staff.edit',compact('data','roles','history_login'));
    }

    function paginate_history_login_user(Request $request,$id)
    {
     if($request->ajax())
     {
        $history_login = HistoryLogin::where('id_user',$id)->paginate(10);
        return view('be.staff.paginate', compact('history_login'))->render();
     }
    }
    public function update($id,Request $request){
        $trans = [
            'name.required' => 'Tên khách hàng đang bỏ trống !',
            'name.max' => 'Tên khách hàng quá dài !',
            'img.image' => 'Chỉ được upload hình ảnh',
            'img.mimes'=> 'Định dạng cho phép là jpeg, png, jpg, gif, svg',
            'img.max' => 'Kích thước ảnh tối đa là 2MB',
            'file.max'=> 'Kích thước tệp tối đa là 10MB',
            'file.mimes'=> 'Định dạng tệp cho phép là zip, pdf, jpeg, png, jpg',
            'email.email' => 'Email chưa đúng định dạng',
            'email.required' => 'Email không được bỏ trống',
            'email.unique' => 'Email đã tồn tại trong hệ thống'
        ];
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => "unique:users,email,$id,id",
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'max:10240|mimes:zip,pdf,jpeg,png,jpg'
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
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->number = $request->number ?? true;
        $data->status = $request->status;
        $data->birth = $request->birth;
        $data->note = $request->note;
        $data->password = Hash::make($request->password);
        $data->img = $filename ?? $data->img;
        $data->file = $file_infoname ?? $data->file;
        $data->save();
        if($request->role){
            $data->roles()->detach();
            $data->assignRole($request->role);
        }
        $activity = Activity::all()->last();
        $activity->description;
        $activity->subject;
        alert()->success('Thành công','Đã cập nhật dữ liệu');
        return back();
    }
    public function clone($id,Request $request){
        $data = User::find($id);
        $newdata = $data->replicate();
        $newdata->created_at = Carbon::now();
        $newdata->save();
        alert()->success('Thành công','Đã copy dữ liệu');
        return redirect()->route('be.staff.index');
    }
    public function destroy($id){
        $data = User::find($id);
        $data->delete();
        $activity = Activity::all()->last();
        $activity->description;
        $activity->changes;
        alert()->success('Thành công','Đã xóa dữ liệu');
        return redirect()->route('be.staff.index');
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

    public function reset_password(Request $request){
        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();
    }

}
