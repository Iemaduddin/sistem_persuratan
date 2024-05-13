<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        if (
            Auth::attempt(['email' => $credentials['login'], 'password' => $credentials['password']]) ||
            Auth::attempt(['username' => $credentials['login'], 'password' => $credentials['password']])
        ) {

            // Periksa apakah pengguna aktif
            if (auth()->user()->status_keaktifan == 'Aktif') {
                $request->session()->regenerate();
                if ($request->has('rememberMe')) {
                    Cookie::queue('userUsername', $request->input('login'), 1440);
                    Cookie::queue('userPassword', $request->input('password'), 1440);
                }
                $user = auth()->user()->role_id;
                if ($user == 1) {
                    return redirect()->route('dashboard_admin');
                } elseif ($user == 2) {
                    return redirect()->route('dashboard_sekum');
                } elseif ($user == 3) {
                    return redirect()->route('dashboard_oc');
                }
            } else {
                Auth::logout();
                return back()->withErrors([
                    'login' => 'Akun Anda tidak aktif. Silakan hubungi Admin.',
                ])->withInput();
            }
        }
        return back()->withErrors([
            'login' => 'Username/Email atau Password Anda Salah!',
        ])->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
