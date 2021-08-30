<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menus;
use App\Models\News;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;


class MenusController extends Controller
{
    public function getList(){
        $menus = Menus::all();
        return view('admin.menus.list', ['menus' => $menus]);
    }
    public function getAdd(){
        $category = Categories::where('parent_id', 0)->get();
        $new = News::all();
        $menus = Menus::where('parent_id', 0)->get();
        return view('admin.menus.add')->with(compact('menus','category','new'));
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:menus,name',
            'type'=> 'required',
            'order' => 'required',
            'page' => 'required',
            'parent' => 'required',
        ],[
            'name.required' => 'The Name field is required.',
            'name.unique' => 'The Name(VN) has already been taken.',
            'type.required' => 'The Type field is required.',
            'order.required' => 'The Menu Order field is required.',
            'page.required' => 'The Page field is required.',
            'parent.required' => 'The Parent field is required.',

        ]);

        $menus = new Menus;
        $menus->name = $request->name;
        $menus->type = $request->type;
        $menus->menu_url = $request->url;    
        $menus->menu_order = $request->order;
        $menus->page_id = $request->page;
        $menus->parent_id = $request->parent;  
        $menus->save();
        Toastr::success('Thêm thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function getEdit($id){
        $category = Categories::where('parent_id', 0)->get();
        $new = News::all();
        $menuparent = Menus::where('parent_id', 0)->get();
        $menus = Menus::find($id);
        return view('admin.menus.edit')->with(compact('category', 'new', 'menuparent', 'menus'));
    }
    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'type'=> 'required',
            'order' => 'required',
            'page' => 'required',
            'parent' => 'required',
        ],[
            'name.required' => 'The Name(VN) field is required.',
            'type.required' => 'The Type field is required.',
            'order.required' => 'The Menu Order field is required.',
            'parent.required' => 'The Parent field is required.',

        ]);
        $menus = Menus::find($id);
        $menus->name = $request->name;
        $menus->type = $request->type;
        $menus->menu_url = $request->url;    
        $menus->menu_order = $request->order;
        $menus->page_id = $request->page;
        $menus->parent_id = $request->parent;  
        $menus->save();
        Toastr::success('Sửa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function postdelete($id) {
        $menus = Menus::find($id);
        $menus->delete();
        Toastr::success('Xóa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return redirect('admin/menus/list');
    }
}