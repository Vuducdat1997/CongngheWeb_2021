<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $users = User::select('users.*', 'role.name as rolename')
                ->join('role', 'users.role_id', '=', 'role.id')
                ->where('users.id', '=', $user->id)
                ->first();

            if ($users->rolename == 'admin') {
                return $next($request);
            } else {
                Toastr::error('Bạn không có quyền truy cập vào trang Admin', 'Đăng nhập thất bại', ["positionClass" => "toast-top-center"]);
                return redirect('login');
            }
        } else {
            Toastr::error('Bạn không có quyền truy cập vào trang Admin', 'Đăng nhập thất bại', ["positionClass" => "toast-top-center"]);
            return redirect('login');
        }
    }
}