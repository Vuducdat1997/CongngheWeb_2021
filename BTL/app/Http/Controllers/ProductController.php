<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function getList(){
        $products = Product::all();
        return view('admin.product.list', ['products' => $products]);
    }

    public function getAdd(){
        return view('admin.product.add');
    }

    public function postAdd(Request $request){
        $this->validate($request,[
            'title'=>'required|min:5|max:50',
            'describe'=>'required|max:255',
            'content'=>'required',
            'capacity'=>'required',
            'plastic_box'=>'required',
            'concentration'=>'required',
            'banner' => 'mimes:jpeg,jpg,png',
            'logo' => 'mimes:jpeg,jpg,png',
            'image' => 'mimes:jpeg,jpg,png',
            'status' => 'required',
        ],[
            'title.required' => 'The Title field is required.',
            'title.min' => 'The Title must be at least 5 characters.',
            'title.max' => 'The Title may not be greater than 50 characters.',
            'describe.required' => 'The Describe field is required.',
            'describe.max' => 'The Describe may not be greater than 255 characters.',
            'content.required' => 'The Content field is required.',
            'capacity.required' => 'The Capacity Content field is required.',
            'plastic_box.required' => 'The Plastic box field is required.',
            'concentration.required' => 'The Concentration field is required.',
            'status.required' => 'The Status field is required.',

        ]);

        $products = new Product;
        $products->title = $request->title;
        $products->describe = $request->describe;
        $products->content = $request->content;
        $products->capacity = $request->capacity;
        $products->plastic_box = $request->plastic_box;
        $products->concentration = $request->concentration;
        $products->status = $request->status;
        
        $mang = ["banner","logo","image"];
        foreach($mang as $key=>$value){

            if($request->hasFile($mang[$key])){
                $file = $request->file($mang[$key]);
                $filename = $file->getClientOriginalName();
                $random = Str::random(4)."_".$filename;
                while(file_exists("upload/product".$random)){
                    $random = Str::random(4)."_".$filename;
                }
                $file->move("upload/product", $random);
                File::delete(public_path("upload/product/".$products->$value));
                $products->$value = $random;
                $key++;
            } else{
                $products->$value = $products->$value;
            } 
        }  
        $products->save();
        Toastr::success('Thêm thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function getEdit($id){
        $products = Product::find($id);

        $data = [
            'products' => $products,
        ];
        return view('admin.product.edit', $data);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'title'=>'required|min:5|max:50',
            'describe'=>'required|max:255',
            'content'=>'required',
            'capacity'=>'required',
            'plastic_box'=>'required',
            'concentration'=>'required',
            'banner' => 'mimes:jpeg,jpg,png',
            'logo' => 'mimes:jpeg,jpg,png',
            'image' => 'mimes:jpeg,jpg,png',
            'status' => 'required',
        ],[
            'title.required' => 'The Title field is required.',
            'title.min' => 'The Title must be at least 5 characters.',
            'title.max' => 'The Title may not be greater than 50 characters.',
            'describe.required' => 'The Describe field is required.',
            'describe.max' => 'The Describe may not be greater than 255 characters.',
            'content.required' => 'The Content field is required.',
            'capacity.required' => 'The Capacity Content field is required.',
            'plastic_box.required' => 'The Plastic box field is required.',
            'concentration.required' => 'The Concentration field is required.',
            'status.required' => 'The Status field is required.',

        ]);
        $products = Product::find($id);
        $products->title = $request->title;
        $products->describe = $request->describe;
        $products->content = $request->content;
        $products->capacity = $request->capacity;
        $products->plastic_box = $request->plastic_box;
        $products->concentration = $request->concentration;
        $products->status = $request->status;
        
        $mang = ["banner","logo","image"];
        foreach($mang as $key=>$value){

            if($request->hasFile($mang[$key])){
                $file = $request->file($mang[$key]);
                $filename = $file->getClientOriginalName();
                $random = Str::random(4)."_".$filename;
                while(file_exists("upload/product".$random)){
                    $random = Str::random(4)."_".$filename;
                }
                $file->move("upload/product", $random);
                File::delete(public_path("upload/product/".$products->$value));
                $products->$value = $random;
                $key++;
            } else{
                $products->$value = $products->$value;
            } 
        }  
        $products->save();
        Toastr::success('Sửa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }
    public function postdelete($id) {
        $products = products::find($id);
        File::delete(public_path("upload/product/".$products->image));
        $products->delete();
        Toastr::success('Xóa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return redirect('admin/product/list');
    }

}