<?php

namespace App\Http\Controllers\member;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function get_registration(){
        return view('member.register');
    }

    protected function post_registration(Request $req){

        $user = new User();
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->password =  bcrypt($req->input('password'));
        $user->role = 2;
        $user->confirmed = 0;
        $user->confirm_code = md5($req->input('email'));

        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:12|confirmed',
            'password_confirmation' => 'required|string|min:6|max:12'],
            $messages = [
                'required' => 'Không được để trống :attribute',
                'max' => 'Tên không quá 30 ký tự,mật khẩu không ít hơn 12 và nhiều hơn 12 kí tự',
                'unique' => ':attribute đã đăng ký',
                'confirmed' => 'Mật khẩu xác thực không khớp',
                'min' => 'Mật Khẩu không ít hơn 6 và không quá 12 ký tự'
            ]
        
        );

        if ($validator->fails()) {
            return back()->withInput()
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user->save();
            return redirect('/');
         
    }
        }
}
