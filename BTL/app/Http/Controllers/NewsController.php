<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    public function getList(){
        $categories = Categories::where('parent_id',0)->get();
        $news = News::select('news.*', 'categories.name as categoriname', 'users.name as username')
        ->join('categories', 'news.categories_id' , '=', 'categories.id')
        ->leftJoin('users', 'news.user_id' , '=', 'users.id')
        ->get();
        return view('admin.news.list')->with(compact('news', 'categories'));
    }
    public function getAdd(){
        $categories = Categories::where('parent_id',0)->get();
        $data = [
            'categories' => $categories,
        ];
        return view('admin.news.add', $data);
    }

    public function postAdd(Request $request) {
        $this->validate($request, [
            'categories' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required',
            'featured' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ],[
            'categories.required' => 'The Categories field is required.',
            'title.required' => 'The Title field is required.',
            'details.required' => 'The Details field is required.',
            'status.required' => 'The Status field is required.',
            'featured.required' => 'The Featured field is required.',
        ]);
        $user_id = Auth::id();

        $news = new News;
        $news->categories_id = $request->categories;
        $news->title = $request->title;
        $news->desc = $request->desc;
        $news->slug = (Str::slug(strip_tags($request->title)));
        $news->details = $request->details;
        $news->status = $request->status;
        $news->featured = $request->featured;
        $news->user_id = $user_id;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $random = Str::random(4)."_".$filename;
            while(file_exists("upload/news".$random)){
    			$random = Str::random(4)."_".$filename;
    		}
    		$file->move("upload/news", $random);
    		$news->image = $random;
        } else{
            $news->image = "";
        }

        $news->save();
        Toastr::success('Thêm thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function getEdit($id){
        $news = News::find($id);
        $categories = Categories::where('parent_id',0)->get();
        $data = [
            'news' => $news,
            'categories' => $categories,
        ];
        return view('admin.news.edit', $data);
    }

    public function postEdit(Request $request, $id){
        $this->validate($request, [
            'categories' => 'required',
            'title' => 'required',
            'details' => 'required',
            'status' => 'required',
            'featured' => 'required',
        ],[
            'categories.required' => 'The Categories field is required.',
            'title.required' => 'The Title field is required.',
            'details.required' => 'The Details field is required.',
            'status.required' => 'The Status field is required.',
            'featured.required' => 'The Featured field is required.',
        ]);

        $news = News::find($id);
        $news->categories_id = $request->categories;
        $news->title = $request->title;
        $news->desc = $request->desc;
        $news->slug = (Str::slug(strip_tags($request->title)));
        $news->details = $request->details;
        $news->status = $request->status;
        $news->featured = $request->featured; 

        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect('admin/news/add')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
    		}
            $filename = $file->getClientOriginalName();
            $random = Str::random(4)."_".$filename;
            while(file_exists("upload/news".$random)){
    			$random = Str::random(4)."_".$filename;
    		}
    		$file->move("upload/news", $random);
            File::delete(public_path("upload/news/".$news->image));
    		$news->image = $random;
        } else{
            $news->image = $news->image;
        }

        $news->save();
        Toastr::success('Sửa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function postdelete($id) {
        $news = News::find($id);
        File::delete(public_path("upload/news/".$news->image));
        $news->delete();
        Toastr::success('Xóa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return redirect('admin/news/list');
    }
    public function search(Request $request){
        if ($request->ajax()) {
        	$output = '';
            $new = News::select('news.*', 'categories.name as categoriname')
            ->join('categories', 'news.categories_id' , '=', 'categories.id')
            ->where('name', 'LIKE', '%' . $request->search . '%')->paginate(1); 
            return view('admin.news.search', ['new'=>$new])->render();
        }
    }
}