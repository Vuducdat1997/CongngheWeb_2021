<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photos;
use App\Models\Photogroups;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;


class PhotosController extends Controller
{
    public function getList(){
        $photos = Photos::select('photos.*', 'photogroups.name as photoname')
        ->join('photogroups', 'photos.photogroups_id' , '=', 'photogroups.id')->get();
        return view('admin.photos.list', ['photos' => $photos]);
    }
    public function getAdd(){
        $photogroups = Photogroups::all();
        return view('admin.photos.add', ['photogroups' => $photogroups]);
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50|unique:photogroups,name',
            'image'=> 'required|mimes:jpeg,jpg,png',
            'photogroups' => 'required',
            'describes' => 'required',
        ],[
            'name.required' => 'The Name field is required.',
            'name.max' => 'The Name may not be greater than 7 characters.',
            'name.unique' => 'The Name has already been taken.',
            'image.required' => 'The Image field is required.',
            'photogroups.required' => 'The Photogroup field is required.',
            'describes.required' => 'The Describes field is required.',

        ]);

        $photos = new Photos;
        $photos->name = $request->name;
        $photos->photogroups_id = $request->photogroups;
        $photos->desc = $request->describes;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $random = Str::random(4)."_".$filename;
            while(file_exists("upload/photos".$random)){
    			$random = Str::random(4)."_".$filename;
    		}
    		$file->move("upload/photos", $random);
    		$photos->image = $random;
        } else{
            $photos->image = "";
        }    
        $photos->save();
        Toastr::success('Thêm thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function getEdit($id){
        $photos = Photos::select('photos.*', 'photogroups.name as photoname')
        ->join('photogroups', 'photos.photogroups_id' , '=', 'photogroups.id')
        ->where('photos.id', '=', $id)
        ->first();
        $photogroups = Photogroups::all();
        // $photos = Photos::find($id);
        $data = [
            'photos' => $photos,
            'photogroups' => $photogroups,
        ];
        return view('admin.photos.edit', $data);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|max:50',
            // 'image'=> 'required',
            'photogroups' => 'required',
            'describes' => 'required',
        ],[
            'name.required' => 'The Name field is required.',
            'name.max' => 'The Name may not be greater than 7 characters.',
            // 'image.required' => 'The Image field is required.',
            'photogroups.required' => 'The Photogroup field is required.',
            'describes.required' => 'The Describes field is required.',

        ]);
        $photos = Photos::find($id);
        $photos->name = $request->name;
        $photos->photogroups_id = $request->photogroups;
        $photos->desc = $request->describes;
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect('admin/photos/add')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
    		}
            $filename = $file->getClientOriginalName();
            $random = Str::random(4)."_".$filename;
            while(file_exists("upload/photos".$random)){
    			$random = Str::random(4)."_".$filename;
    		}
    		$file->move("upload/photos", $random);
            File::delete(public_path("upload/photos/".$photos->image));
    		$photos->image = $random;
        } else{
            $photos->image = $photos->image;
        }
        $photos->save();
        Toastr::success('Sửa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }
    public function postdelete($id) {
        $photos = Photos::find($id);
        File::delete(public_path("upload/photos/".$photos->image));
        $photos->delete();
        Toastr::success('Xóa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return redirect('admin/photos/list');
    }
}