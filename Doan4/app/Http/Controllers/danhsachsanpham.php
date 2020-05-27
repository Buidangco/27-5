<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use DB;

class danhsachsanpham extends Controller
{
    public function danhsach(Request $req)
    {
    	$code=$req->id;
    	$data=DB::table('sanpham')->where('code',$code)->paginate(15);
    	$loaisp = DB::table("codeloai")->get();
    	return view("danhsachsanpham.danhsachsanpham")->with('data',$data)->with('loaisp',$loaisp);
    }
        public function timkiem1(Request $req,$nameprice,$code)
    {
    	$data=DB::table('sanpham')->where([
    		['name','LIKE','%'.$nameprice.'%'],
    		['code',$code],
    	])->orWhere([['price','LIKE','%'.$nameprice.'%'],['code',$code]])->paginate(15);
    	return view("danhsachsanpham.timkiemdanhsachsanpham")->with('data',$data);
    }

    public function danhsachsan(Request $req,$id){
        $data =DB::table('sanpham')->where('code',$id)->get();
        return view("danhsachsanpham.timkiemdanhsachsanpham")->with('data',$data);
}

    function choncode(Request $req,$code){
            $loaisp = DB::table("codeloai")->get();
            $data=DB::table('sanpham')->where('code',$code)->paginate(15);
            return view("layout_sanpham.danhsachsanpham")->with('data',$data)->with('loaisp',$loaisp);
    }
   function chonmasanpham(Request $req,$id){
        $loaisp = DB::table("codeloai")->get();
        $list_product1=DB::table("sanpham")->get();
        
        $sanpham_ct=DB::table("sanpham")->where('id',$id)->get();
        foreach ($sanpham_ct as $key) {
            $codema=$key->code;
              $sanpham_ct1=DB::table("sanpham")->where('code',$codema)->get();
        }
                $binhluan=DB::table('userkhachhang')
        ->join('binhluan','binhluan.idauth','userkhachhang.id')
        ->join('sanpham','sanpham.id','binhluan.idbl')
        ->where('sanpham.id',$id)
        ->select('userkhachhang.*','binhluan.binhluan','binhluan.ngay')
        ->get();
                $loaisp = DB::table("codeloai")->get();
            return view('layout_sanpham.chitietsanpham')->with('loaisp',$loaisp)->with('list_product1',$list_product1)->with('sanpham_ct',$sanpham_ct)->with('sanpham_ct1',$sanpham_ct1)->with('binhluan',$binhluan)->with('loaisp',$loaisp);      
   }


}
