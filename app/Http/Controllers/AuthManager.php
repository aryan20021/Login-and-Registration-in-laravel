<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('login');
    }

    public function registration()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('registration');
    }

    public function loginPost(Request $req)
    {
        $req->validate([
            'email' => 'required |email',
            'password' => 'required'

        ]);

        $credential = $req->only('email', 'password');

        if (Auth::attempt($credential)) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->with('error', 'Login details are not valid');
    }

    public function registrationPost(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if (!$user) {
            return redirect()->route('new.user')->with('error', 'Registration failed try again');
        }
        return redirect()->route('login')->with('success', 'Registration success, Please login to access the app');
    }
    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
