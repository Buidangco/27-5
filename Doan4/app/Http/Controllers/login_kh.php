<?php

namespace App\Http\Controllers;
use App\UserKhachhang;
use Illuminate\Support\Facades\Auth;//xác thực user có tồn tại hay không 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;//lấ hết được dữ liệu gét post
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use DB;

class login_kh extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth:admin');
    // }
	   public  function index1(Request $req)
    {   
        $loaisp = DB::table("codeloai")->get();
        return view('login_kh.login',compact('loaisp'));
    }

    public  function index(Request $req)
    {   
        //      $mang=[];
        // $name;
        $email=$req->email;
        $pass=$req->Password;
        $rules=[
        'email'=> 'required|email',
        'Password'=>'required|min:0',
        ];
        $messages=[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'Password.requserkhachhanguired'=>'Vui lòng nhập mật khẩu',
            'Password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'Password.max'=>'Mật khẩu không quá 20 kí tự',
        ];
        $Validator=Validator::make($req->all(),$rules, $messages);

        if($Validator->fails()){

           return Redirect()->back()->withErrors($Validator)->withInput();
        }

        else
        {
            // dd($req->all('_token'));
         // $credentials=DB::table('userkhachhang')->where([['email',$email],['password',$pass]])->get();
         //  foreach ($credentials as $key => $value) {
         //    $mang =array('email'=>$value->email,'password'=>$value->password);
         //    $name=$value->name;
         // }
        if(Auth::guard('admin')->attempt(['email'=>$email,'password'=>$pass,'titile'=>'nhanvien'])){

           return Redirect('/product')->with(['flag'=>'success','message'=>'Đăng nhập thành ']);
        }
        else if(Auth::guard('admin')->attempt(['email'=>$email,'password'=>$pass,'titile'=>'khachhang'])){
           // return Redirect('/Home/Cart/List_cart')->with(['flag'=>'success','message'=>'Đăng nhập thành ']);
            // return back()->withInput();

        return back()->withInput()->withErrors("Đăng nhập thành công");

        }
        else
        {
        return Redirect::to('/Home1/login')->withInput()->withErrors("Email hoặc mật khẩu không đúng !");
        }
        }
        // $mang=[];
        // $name;
        // Validator::make([
        //     'email'=> 'required|email',
        //     'password'=>'required|min:6|max|20',
        // ],
        // [
        //     'email.required'=>'Vui lòng nhập email',
        //     'email.email'=>'Không đúng định dạng email',
        //     'password.required'=>'Vui lòng nhập mật khẩu',
        //     'password.min'=>'Mật khẩu ít nhất 6 kí tự',
        //     'password.max'=>'Mật khẩu không quá 20 kí tự',
        // ]);
        // $email=$req->email;
        // $password=$req->Password;
        // $credentials=DB::table('taikhoan_kh')->where([['email',$email],['password',$password]])->get();
        // foreach ($credentials as $key => $value) {
        //     $mang =array('email'=>$value->email,'password'=>$value->password);
        //     $name=$value->name;
        // }
        // // dd($credentials);
        // if(Auth::attempt($mang)){
        //     return Redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công'])->with('ten',$name);
        // }
        // else{
        //     return Redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);

        // }

    }
            public function logout( Request $req){
            Auth::guard('admin')->logout();
            $req->Session()->forget('Cart');
            return Redirect()->route('/Home/home');
        }

         public  function index5(Request $req)
    {   
        //      $mang=[];
        // $name;
        $email=$req->email;
        $pass=$req->Password;
        $rules=[
        'email'=> 'required|email',
        'Password'=>'required|min:0',
        ];
        $messages=[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'Password.required'=>'Vui lòng nhập mật khẩu',
            'Password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'Password.max'=>'Mật khẩu không quá 20 kí tự',
        ];
        $Validator=Validator::make($req->all(),$rules, $messages);

        if($Validator->fails()){
           return Redirect()->back()->withErrors($Validator)->withInput();
        }
        else
        {
         // $credentials=DB::table('userkhachhang')->where([['email',$email],['password',$pass]])->get();
         //  foreach ($credentials as $key => $value) {
         //    $mang =array('email'=>$value->email,'password'=>$value->password);
         //    $name=$value->name;
         // }
        if(Auth::guard('admin')->attempt(['email'=>$email,'password'=>$pass,'titile'=>'nhanvien'])){
            return back()->withInput()->withErrors("Đăng nhập thành công");
        }
        else if(Auth::guard('admin')->attempt(['email'=>$email,'password'=>$pass,'titile'=>'khachhang'])){
           // return Redirect('/Home/Cart/List_cart')->with(['flag'=>'success','message'=>'Đăng nhập thành ']);
            // return back()->withInput();
        return back()->withInput()->withErrors("Đăng nhập thành công");

        }
        else
        {
        // return Redirect::to('/Home1/login')->withInput()->withErrors("Email hoặc mật khẩu không đúng !");
         return back()->withInput()->withErrors("Email hoặc mật khẩu không đúng !");
        }
        }
    }
    
}
