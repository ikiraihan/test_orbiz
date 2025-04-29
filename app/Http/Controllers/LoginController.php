<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    
    public function login(Request $request){

        $username = $request->username;
        $password = $request->password;

        if($username == 'admin@gmail.com' && $password == 'admin123'){
            return redirect('/buku');
        }else{
            return back()->with('error', 'Login Gagal!');
        }
    }
}
