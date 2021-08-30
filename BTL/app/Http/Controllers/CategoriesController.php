<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Categories; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;


class CategoriesController extends Controller
{
    public function getList(){
        $categories = Categories::all();
        return view('admin.categories.list', ['categories' => $categories]);
    }
    public function getAdd(){
        $categories = Categories::where('parent_id', 0)->get();
        $data = [
            'categories'=>$categories, 
        ];

        return view('admin.categories.add', $data);
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'name'=>'required|min:5|max:50|unique:categories,name',
            'parent' => 'required',
            'status' => 'required',
        ],[
            'name.required' => 'The Categories Name field is required.',
            'name.min' => 'The Categories Name must be at least 5 characters.',
            'name.max' => 'The Categories Name may not be greater than 50 characters.',
            'name.unique' => 'The Categories Name has already been taken.',
            // 'image.required' => 'The Image field is required.',
            'parent.required' => 'The Parent field is required.',
            'status.required' => 'The Status field is required.',

        ]);

        $categories = new Categories;
        $categories->name = $request->name;
        $categories->slug = (Str::slug($request->name));
        $categories->parent_id = $request->parent;
        $categories->status = $request->status;
        $categories->save();
        Toastr::success('Thêm thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }
    public function getEdit($id){
        $categories = Categories::find($id);
        $categories_parent = Categories::where('parent_id', 0)->get();

        $data = [
            'categories' => $categories,
            'categories_parent' => $categories_parent,
        ];
        return view('admin.categories.edit', $data);
    }

    public function postEdit(Request $request,$id){
        $validator = $request->validate([
            'name'=>'required|min:5|max:50',
            'parent' => 'required',
            'status' => 'required',
        ],[
            'name.required' => 'The Categories Name field is required.',
            'name.min' => 'The Categories Name must be at least 5 characters.',
            'name.max' => 'The Categories Name may not be greater than 50 characters.',
            // 'image.required' => 'The Image field is required.',
            'parent.required' => 'The Parent field is required.',
            'status.required' => 'The Status field is required.', 

        ]);
        $categories = Categories::find($id);
        $categories->name = $request->name;
        $categories->slug = (Str::slug($request->name));
        $categories->parent_id = $request->parent;
        $categories->status = $request->status;
        $categories->save();
        Toastr::success('Sửa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }
    public function postdelete($id) {
        $categories = Categories::find($id);
        File::delete(public_path("upload/categories/".$categories->image));
        $categories->delete();
        Toastr::success('Xóa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return redirect('admin/categories/list');
    }
}