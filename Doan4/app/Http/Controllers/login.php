<?php

namespace App\Http\Controllers;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;//lấ hết được dữ liệu gét post
use Illuminate\Support\Facades\Auth;//xác thực user có tồn tại hay không 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class login extends Controller
{
	public  function validate1(array $data)
	{	
		return Validator::make($data,[
			'email'=>'required|email|max:255',//dữ liệu bắt buộc max 255
			'password'=>'required|min:0',
		]);
	}
    public function index(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$email = $request->input("email");
    		$pass= $request->input("password");
    		$Validator =$this->validate1($request->all());
    		if($Validator->fails()){
    			return Redirect::to('/login')->withInput()->withErrors($Validator);
    		}
           else if(Auth::guard('admin1')->attempt(['email'=>$email,'password'=>$pass])){
                    Redirect::to("/");
                }
    		else{

    		   return Redirect::to('/login')->withInput()->withErrors("Email hoặc mật khẩu không đúng !");
    		}
    		return back()->withInput();
    	}
    	return view('login.index');
    }
    public function logout(){
    	if(Auth::guard('admin1')->logout()){
    		return Redirect('/login');
    	}
    	return Redirect('/product');
    }
}
