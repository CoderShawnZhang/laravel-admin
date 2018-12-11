<?php

namespace App\Http\Controllers\Auth;

use App\Facades\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\LoginForm;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/system/desktop';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(LoginForm $request)
    {
        $inputs = $request->all();
        if (Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password']])) {
            // 认证通过...
            return redirect()->route('admin.system.desktop');
        }
        return redirect(url('auth/login'))->withErrors('用户名或密码错误！');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/auth/login');
    }
}
