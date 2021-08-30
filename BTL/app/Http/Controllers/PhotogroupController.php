<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photogroups;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;


class PhotogroupController extends Controller
{
    public function getList(){
        $photogroups = Photogroups::all();
        return view('admin.photogroups.list', ['photogroups' => $photogroups]);
    }
    public function getAdd(){
        return view('admin.photogroups.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50|unique:photogroups,name',
        ],[
            'name.required' => 'The Name(VN) field is required.',
            'name.max' => 'The Name(VN) may not be greater than 50 characters.',
            'name.unique' => 'The Name(VN) has already been taken.',

        ]);

        $photogroups = new Photogroups;
        $photogroups->name = $request->name;
        $photogroups->content = $request->content;  
        $photogroups->save();
        Toastr::success('Thêm thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function getEdit($id){
        $photogroups = Photogroups::find($id);
        $data = [
            'photogroups' => $photogroups,
        ];
        return view('admin.photogroups.edit', $data);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|max:50',
        ],[
            'name.required' => 'The Name(VN) field is required.',
            'name.max' => 'The Name(VN) may not be greater than 7 characters.',

        ]);
        $photogroups = Photogroups::find($id);
        $photogroups->name = $request->name;
        $photogroups->content = $request->content;
        
        $photogroups->save();
        Toastr::success('Sửa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function postdelete($id) {
        $photogroups = Photogroups::find($id);
        $photogroups->delete();
        Toastr::success('Xóa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return redirect('admin/photogroups/list');
    }
}