<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    | Login Controller
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    */


    //protected $redirectTo = '/home'; 
    /* -changed to redirect users based on roles*/
    public function showLoginForm() {
        return view('auth.login'); 
    }

    public function login(Request $request) {
        //validate input
        $request->validate([
            'email' => 'required|email',
            'password' =>  'required|min:8'
        ]);
        //attempt to login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //redirect based on role
            $user = Auth::user();
            if ($user->role === 'employer') {
                return redirect('/employer-dashboard');
            } elseif ($user->role === 'worker') {
                return redirect('/worker-dashboard');
            }
            return redirect('/home');
        }
        //redirect with error
        return back()->withErrors(['email' => 'Invalid login details.']);
    }

    //logout user
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); //prevent CSRF errors

        return redirect('/login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
