<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Collection;
use Str;


class RolePermissionController extends Controller
{
    public function index(){
        $data = Role::get();
        return view('be.role-permission.index',compact('data'));
    }
    public function add(){
        return view('be.role-permission.create');
    }
    public function store(Request $request){
        $trans = [
            'name.required' => 'Tên không được bỏ trống !',
            'name.unique' => 'Tên này đã tồn tại trong hệ thống !',
        ];
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ],$trans);
        $role = Role::create([  'description' => $request->name,
                                'name' => Str::slug($request->name) ]);
        foreach ($request->permission as $value ) {
            $check = Permission::where('name',Str::slug($value))->first();
            if(isset($check)){
                    $check->assignRole($role);
            }else{
                $permission = Permission::create(['description' => $value,
                'name'=>Str::slug($value)]);
                $permission->assignRole($role);
            }
        }
        alert()->success('Thành công','Đã thêm dữ liệu');
        return redirect()->route('be.role_permission.index');
    }
    public function edit(Request $request, $id){
    	$data = Role::find($id);
        $permissions = $data->getAllPermissions()->pluck('name');
    	return view('be.role-permission.edit',compact('data','permissions'));
    }

    public function update(Request $request, $id){
    	$data = Role::find($id);
    	$lang = [
    	    'name.required' => 'Tên vai trò không được bỏ trống !',
            'name.unique' => 'Tên này đã tồn tại trong hệ thống !'
    	];
    	$request->validate([
            'name' => "required|unique:roles,name,$id,id",
    	], $lang);
        $data->description = $request->name;
    	$data->name = Str::slug($request->name);
        $data->save();
        if($request->permission){
            $permissions = $data->getAllPermissions();
            $data->revokePermissionTo($permissions);
            foreach ($request->permission as $value ) {
                $check = Permission::where('name',Str::slug($value))->first();
                if(isset($check)){
                        $check->assignRole($data);
                }else{
                    $permission = Permission::create(['description' => $value,'name'=>Str::slug($value)]);
                    $permission->assignRole($data);
                }
            }
        }
        alert()->success("Thành công",'Đã cập nhật dữ liệu');
    	return back();
    }

    public function destroy(Request $request, $id){
    	$role = Role::find($id);
        $permissions = $role->getAllPermissions();
        $role->revokePermissionTo($permissions);
        $role->delete();
        alert()->success("Thành công",'Đã xóa nhóm quyền');
        return back();
    }
}
