<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class LoginController extends Controller
{
	public function get_login(){
		if(Auth::check()){
			return redirect()->intended('/');
		}else{
			return view('member.login');
		}
		
	}
    public function post_login(Request $req){

    	$remember_me = ($req->has('remember_me')) ? true : false;
    	if (Auth::attempt(['email' => $req->input('email'), 'password' => $req->input('password')],$remember_me)) {
            return redirect()->intended('/');
        }else{
        	return view('member.login',['message' => 'Email hoặc Mật khẩu không đúng']);
        }


	}
}