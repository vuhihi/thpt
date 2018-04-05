<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LogoutController extends Controller
{
    public function post_logout(Request $req){
    	if(Auth::check()){
    		$req->session()->flush();
    		Auth::logout();
    		return redirect()->intended('/');
    	}
    }
}
