<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Role;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;


class RoleController extends Controller
{
    public function getList() {
        $role = Role::all();
        return view('admin.role.list', ['role' => $role]);
    }
    public function getAdd(){
        return view('admin.role.add');
    }

    public function postAdd(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:50|unique:role,name',
        ],[
            'name.required' => 'The Role Name field is required.',
            'name.min' => 'The Role Name must be at least 3 characters.',
            'name.max' => 'The Role Name may not be greater than 50 characters.',
            'name.unique' => 'The Role Name has already been taken.',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->slug = (Str::slug($request->name));
        $role->save();
        Toastr::success('Thêm thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }
    public function getEdit($id){
        $role = Role::find($id);
        return view('admin.role.edit', ['role' => $role]);
    }
    public function postEdit(Request $request, $id){
        $this->validate($request,[
            'name'=>'required|min:3|max:50',
        ],[
            'name.required' => 'The Role Name field is required.',
            'name.min' => 'The Role Name must be at least 3 characters.',
            'name.max' => 'The Role Name may not be greater than 50 characters.',
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->slug = (Str::slug($request->name));
        $role->save();
        Toastr::success('Sửa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function postdelete($id) {
        $role = Role::find($id);
        $role->delete();
        Toastr::success('Xóa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return redirect('admin/role/list');
    }
}