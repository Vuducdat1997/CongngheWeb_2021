<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Slide;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class SlideController extends Controller
{
    public function getList() {
        $slides = Slide::all();
        return view('admin.slide.list', ['slides'=>$slides]);
    }
    public function getAdd(){
        return view('admin.slide.add');
    }
     
    public function postAdd(Request $request){
        $this->validate($request,[
            'image' => 'required|mimes:jpeg,jpg,png',
            'status' => 'required',
        ],[
            'image.required' => 'The Image field is required.',
            'status.required' => 'The Status field is required.',

        ]);

        $slides = new Slide;
        $slides->active_status = $request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $random = Str::random(4)."_".$filename;
            while(file_exists(public_path("upload/slide". $random))){
    			$random = Str::random(4)."_".$filename;
    		}
    		$file->move(public_path("upload/slide"), $random);
    		$slides->image = $random;
        } else{
            $slides->image = "";
        }    
        $slides->save();
        Toastr::success('Thêm thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function getEdit($id){
        $slides = Slide::find($id);
        $data = [
            'slides' => $slides,
        ];
        return view('admin.slide.edit', $data);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'image' => 'mimes:jpeg,jpg,png',
            'status' => 'required',
        ],[
            'status.required' => 'The Status field is required.',

        ]);
        $slides = Slide::find($id);
        $slides->active_status = $request->status;
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect('admin/slides/add')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
    		}
            $filename = $file->getClientOriginalName();
            $random = Str::random(4)."_".$filename;
            while(file_exists(public_path("upload/slide". $random))){
    			$random = Str::random(4)."_".$filename;
    		}
    		$file->move(public_path("upload/slide"), $random);
            File::delete(public_path("upload/slide/".$slides->image));
    		$slides->image = $random;
        } else{
            $slides->image = $slides->image;
        }
        $slides->save();
        Toastr::success('Sửa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
        
    }

    public function postdelete($id) {
        $slides = Slide::find($id);
        File::delete(public_path("upload/slide/".$slides->image));
        $slides->delete();
        Toastr::success('Xóa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return redirect('admin/slides/list');
    }
}