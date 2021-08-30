<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function getList() {
        $users = User::select('users.*', 'role.name as rolename')
        ->join('role', 'users.role_id' , '=', 'role.id')->get();
        return view('admin.users.list', ['users' => $users]);
    }
    public function getAdd() {
        $role = Role::all();
        return view('admin.users.add', ['role'=>$role]);
    }
    public function postAdd(Request $request) {
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|max:30',
            'retype' => 'required|same:password',
            'role' => 'required',
            'status' => 'required',
            'photo' => 'mimes:jpeg,jpg,png',
        ],[
            'name.required' => 'The Name field is required.',
            'name.min' => 'The Name must be at least 3 characters.',
            'name.max' => 'The Name may not be greater than 50 characters.',
            'email.required' => 'The Email field is required.',
            'email.unique' => 'The Email has already been taken.',
            'password.required' => 'The Password field is required.',
            'password.min' => 'The Password must be at least 8 characters.',
            'password.max' => 'The Password may not be greater than 30 characters.',
            'retype.required' => 'The Retype Password field is required.',
            'retype.same' => 'The Retype Password field must be the same as password field.',
            'status.required' => 'The Status field is required.',
            'role.required' => 'The Role field is required.',

        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role;
        $user->status = $request->status;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect('admin/users/add')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
    		}
            $filename = $file->getClientOriginalName();
            $random = Str::random(4)."_".$filename;
            while(file_exists("upload/users".$random)){
    			$random = Str::random(4)."_".$filename;
    		}
    		$file->move("upload/users", $random);
    		$user->photo = $random;
        } else{
            $user->photo = "";
        }

        $user->save();
        Toastr::success('Thêm thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }
    
    public function getEdit($id) {
        $users = User::select('users.*', 'role.name as rolename')
        ->join('role', 'users.role_id' , '=', 'role.id')
        ->where('users.id', '=', $id)
        ->first();
        $role = Role::all();
        $data = [
            'users' => $users,
            'role' => $role,
        ];
        return view('admin.users.edit', $data);
    }

    public function postEdit(Request $request, $id) {
        $user = User::find($id);
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'email' => 'required|unique:users,email,'.$user->id,
            'password' => 'required|min:8|max:100',
            'retype' => 'required|same:password',
            // 'role' => 'required',
            // 'status' => 'required',
        ],[
            'name.required' => 'The Name field is required.',
            'name.min' => 'The Name must be at least 3 characters.',
            'name.max' => 'The Name may not be greater than 50 characters.',
            'email.required' => 'The Email field is required.',
            'email.unique' => 'The Email has already been taken.',
            'password.required' => 'The Password field is required.',
            'password.min' => 'The Password must be at least 8 characters.',
            'password.max' => 'The Password may not be greater than 100 characters.',
            'retype.required' => 'The Retype Password field is required.',
            'retype.same' => 'The Retype Password field must be the same as password field.',
            // 'status.required' => 'The Status field is required.',
            // 'role.required' => 'The Role field is required.',

        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role;
        $user->status = $request->status;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
    			return redirect('admin/users/add')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
    		}
            $filename = $file->getClientOriginalName();
            $random = Str::random(4)."_".$filename;
            while(file_exists("upload/users".$random)){
    			$random = Str::random(4)."_".$filename;
    		}
    		$file->move("upload/users", $random);
            File::delete(public_path("upload/users/".$users->photo));
    		$user->photo = $random;
        } else{
            $user->photo = $user->photo;
        }

        $user->save();
        Toastr::success('Sửa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return response()->json();
    }

    public function postdelete($id) {
        $users = User::find($id);
        File::delete(public_path("upload/users/".$users->photo));
        $users->delete();
        Toastr::success('Xóa thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
        return redirect('admin/users/list');
    }


    // Login admin  
    public function getLoginAdmin() {
        if(Auth::check()){
            return redirect('admin/news/list');
        } else {
            return view('admin.login');
        }
    }

    public function postLoginAdmin(Request $request){
        $remember = $request->get('remember');
    	$this->validate($request,
            [
                'email' => 'required',
                'password' => 'required|min:8|max:20'
            ],
            [
                'email.required' => 'Bạn chưa nhập vào email',
                'password.required' => 'Bạn chưa nhập vào password',
                'password.min' => 'Độ dài mật khẩu tối thiểu 8 kí tự',
                'password.max' =>'Độ dài mật khẩu tối đa 20 kí tự'
            ]);

         $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

    	if(Auth::attempt($credentials, $remember)){
            Toastr::success('Đăng nhập thành công', 'Thành công', ["positionClass" => "toast-top-center"]);
    		return redirect('admin/news/list');

    	} else {
            Toastr::error('Tài khoản hoặc mật khẩu chưa chính xác', 'Đăng nhập thất bại', ["positionClass" => "toast-top-center"]);
    		return redirect('login');
    	}
    }


    public function logout() {
        Auth::logout();
            return redirect('login');
        
    }
    
}