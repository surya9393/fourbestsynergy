<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        
        return back()->with('loginError', 'Login Failed!');
    }

    public function registerForm(){
        return view('register.index');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'nip' => 'required|numeric|min:4|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/')->with('successRegister', 'Berhasil Register');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('logout', 'berhasil logout');
    }
}
