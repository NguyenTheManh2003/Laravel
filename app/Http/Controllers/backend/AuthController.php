<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AuthController extends Controller
{
    //
    public function __construct()
    {
    }

    public function index()
    {
        return view('backend.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $str_email = $request->input('email');
        $str_password = $request->input('password');
        $user = new User();
        $objUser = $user->getUser($str_email, $str_password);
        if (!empty($objUser)) {
            if ($str_email == $objUser->email && $str_password == $objUser->pass) {
                return redirect()->route('dashboard.index')->with("success", "Đăng nhập thành công");
            }
        }

        return redirect()->route('auth.admin')->with("error", "Đăng nhập thất bại");
    }
}
