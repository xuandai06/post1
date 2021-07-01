<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|alpha_dash|max:255',
            'email' => 'required|email',
            'password' =>'required|confirmed|min:8'
        ]);
        
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $remember = true;
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ],$remember);

        return redirect()->route('dashboard');
    }

}
