<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Upload;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public function getList() {
        $upload = Upload::all();
        return view('admin.upload.list', ['upload'=>$upload]);
    }
    public function getAdd(){
        return view('admin.upload.add');
    }
     
    public function postAdd(Request $request){
        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => 'The Name field is required.',
        ]);
        $upload = new Upload;
        $upload->name = $request->name;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $random = Str::random(4)."_".$filename;
            while(file_exists(public_path("upload/uploads". $random))){
    			$random = Str::random(4)."_".$filename;
    		}
    		$file->move(public_path("upload/uploads"), $random);
    		$upload->file = $random;
        } else{
            $upload->file = "";
        }    
        $upload->save();
        Toastr::success('Thêm thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function getEdit($id){
        $upload = Upload::find($id);
        $data = [
            'upload' => $upload,
        ];
        return view('admin.upload.edit', $data);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'file' => 'require',
            'name' => 'required',
        ],[
            'file.required' => 'The File field is required.',
            'name.required' => 'The Name field is required.',

        ]);
        $upload = Upload::find($id);
        $upload->name = $request->name;
        
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $random = Str::random(4)."_".$filename;
            while(file_exists(public_path("upload/uploads". $random))){
    			$random = Str::random(4)."_".$filename;
    		}
    		$file->move(public_path("upload/uploads"), $random);
            File::delete(public_path("upload/uploads/".$upload->file));
    		$upload->file = $random;
        } else{
            $upload->file = $upload->file;
        }
        $upload->save();
        Toastr::success('Sửa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
        
    }

    public function postdelete($id) {
        $upload = Upload::find($id);
        File::delete(public_path("upload/uploads/".$upload->file));
        $upload->delete();
        Toastr::success('Xóa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return redirect('admin/upload/list');
    }
}