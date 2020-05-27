<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;//lấ hết được dữ liệu gét post
use Illuminate\Support\Facades\Auth;//xác thực user có tồn tại hay không 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Hash;
use DB;

class tao_login extends Controller
{

	public  function index1(Request $req)
    {   
        $loaisp = DB::table("codeloai")->get();

        return view('login_kh.login_out',compact('loaisp'));
    }

    public  function index(Request $req)
    {   
    	// dd($req);
    	$loi=Validator::make([
        	'email'=> 'required|email|unique::taikhoan_kh,email',
        	'password'=>'required|min:6|max|20',
        	'fullname'=>'required',
        	'Repasswork'=>'required|same:password'
        ],
        [
        	'email.required'=>'Vui lòng nhập email',
        	'email.email'=>'Không đúng định dạng email',
        	'email.unique'=>'email có người sử dụng',
        	'password.required'=>'Vui lòng nhập mật khẩu',
        	'Repasswork.same'=>'Mật khẩu không giống nhau',
        	'password.min'=>'Mật khẩu ít nhất 6 kí tự',
        ]);
        // $this->validate([
        // 	'email'=> 'required|email|unique::taikhoan_kh,email',
        // 	'password'=>'required|min:6|max|20',
        // 	'fullname'=>'required',
        // 	'Repasswork'=>'required|same:password'
        // ],
        // [
        // 	'email.required'=>'Vui lòng nhập email',
        // 	'email.email'=>'Không đúng định dạng email',
        // 	'email.unique'=>'email có người sử dụng',
        // 	'password.required'=>'Vui lòng nhập mật khẩu',
        // 	'Repasswork.same'=>'Mật khẩu không giống nhau',
        // 	'password.min'=>'Mật khẩu ít nhất 6 kí tự',
        // ]);
        if($loi->fails()){
        	return Redirect()->back()->withErrors($loi)->withInput();
        }
        $password=bcrypt($req->password);
        $email=$req->email;
        $sdt=$req->SDT;
        $diachi=$req->diachi;
        $fullname=$req->fullname;
        $phai=$req->phai;
        DB::table('userkhachhang')->insert(['email'=>$email,'password'=>$password,'sdt'=>$sdt,'diachi'=>$diachi,'name'=>$fullname,'phai'=>$phai]);
         $loaisp = DB::table("codeloai")->get();

        return view('login_kh.login',compact('loaisp'));
    }
}
