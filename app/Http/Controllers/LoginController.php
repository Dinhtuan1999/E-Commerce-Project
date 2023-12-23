<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->to('home');
        }
        return view('admin.login.login');
    }

    public function post(Request $request){
        $remember = $request->remember ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->to('home');
        }
    }
}
