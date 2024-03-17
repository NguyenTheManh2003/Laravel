<?php

    namespace App\Http\Controllers\frontend;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Http\Requests\LoginRequest;
    use Illuminate\Support\Facades\Auth;

    class LoginController extends Controller
    {
        //

        public function index()
        {
            return view('frontend.login.index');
        }
        public function authenticate(LoginRequest $request)
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }

            return redirect()->route('login')->withInput($request->only('email'))->withErrors(['error' => 'Đăng nhập thất bại. Email hoặc mật khẩu không chính xác.']);
        }

        public function logout(Request $request)
        {
            Auth::logout();

            // $request->session()->invalidate(); // Nếu muốn hủy bỏ phiên làm việc

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }