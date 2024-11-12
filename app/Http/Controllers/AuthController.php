<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the registration form
    public function register()
    {
        return view('pages.auth.register');
    }

    // Handle registration
    public function storeRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'jenis_kelamin' =>'required',
            'alamat' =>'required',
            'password' => 'required|min:8',

        ]);

        User::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'email' => $request->email,
            'jenis_kelamin'  =>$request->jenis_kelamin,
            'alamat'  =>$request->alamat,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    // Show the login form
    public function login()
    {
        return view('pages.auth.login');
    }

    // Handle login
    public function storelogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ],[
            'email.required' => 'email harus di isi',
            'email.email'    => 'isi harus berbentuk email',
            'password.required' => 'password harus di isi'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login successful.');
        } else {
            return back()->withErrors(['email' => 'Email or password is incorrect.'])
                         ->onlyInput('email');
        }
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout successful.');
    }

    public function profile(){
        $users  = User::all();
        return view('pages.user.profile',compact('users'));
    }
}
