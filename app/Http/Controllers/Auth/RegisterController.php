<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    | Register Controller
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    */

    public function showRegistrationForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        //validate input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => [
                'required', 
                'min:8', 
                'confirmed',
                'regex:/[a-z]/', // at least one lowercase
                'regex:/[A-Z]/', // at least one uppercase
                'regex:/[0-9]/'  // at least one number
            ],
            'role' => 'required|in:worker,employer',
        ]);

        //create user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        //log user
        Auth::login($user);

        //redirect based on role
        return redirect($user->role === 'employer' ? '/employer-dashboard' : '/worker-dashboard');
    }

    public function __construct()
    {
        $this->middleware('guest');
    }
}