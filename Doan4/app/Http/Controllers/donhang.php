<?php

namespace App\Http\Controllers;

use App\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Mail;
use App\UserKhachhang;
use Carbon\Carbon;

class donhang extends Controller
{
    public function index(Request $req){
    	$id=$req->id;
      $stt=0;
    	$data3=DB::table("hoadonban")->get();
    	 $choxacnhan =DB::table("userkhachhang")
        ->join('hoadonban','hoadonban.id','userkhachhang.id')
        ->join('khachhang','hoadonban.makh','khachhang.makh')
        ->select('khachhang.sdt','khachhang.makh','khachhang.tenKH','userkhachhang.email','userkhachhang.id','hoadonban.*')
        ->where([
          ['hoadonban.id',$id],
          ['hoadonban.xacnhan','Chưa duyệt'],
          ])
        ->get();
         $tatca =DB::table("userkhachhang")
        ->join('hoadonban','hoadonban.id','userkhachhang.id')
        ->join('khachhang','hoadonban.makh','khachhang.makh')
        ->select('khachhang.tenKH','khachhang.sdt','userkhachhang.email','hoadonban.*')
        ->where(
          'hoadonban.id',$id
          )
        ->get();

         $huydon =DB::table("userkhachhang")
        ->join('hoadonban','hoadonban.id','userkhachhang.id')
        ->join('khachhang','hoadonban.makh','khachhang.makh')
        ->select('khachhang.sdt','khachhang.tenKH','userkhachhang.email','userkhachhang.id','hoadonban.*')
        ->where([
          ['hoadonban.id',$id],
          ['hoadonban.xacnhan','Hủy'],
          ])
        ->get();
        $donhuy=DB::table('donhanghuy')->get();
       // foreach ($data as $key => $value) {
       //  	array_push($tenkh,$value->tenKH,$value->email,$value->sdt,$value->gia,$value->ngayban);
       //  	array_push($email,$value->email);
       //  	array_push($sdt,$value->sdt);
       //  	array_push($gia,$value->gia);
       //  	array_push($ngayban,$value->ngayban);
       //  }
       //  dd($tenkh);
               $danggiao =DB::table("userkhachhang")
        ->join('hoadonban','hoadonban.id','userkhachhang.id')
        ->join('khachhang','hoadonban.makh','khachhang.makh')
        ->select('khachhang.sdt','khachhang.makh','khachhang.tenKH','userkhachhang.email','userkhachhang.id','hoadonban.*')
        ->where([
          ['hoadonban.id',$id],
          ['hoadonban.xacnhan','đã duyệt'],
          ['hoadonban.trangthai','Đang giao hàng'],
          ])
        ->get();
    	        $loaisp = DB::table("codeloai")->get();
    	return view('donhang.indexgiohang')->with('loaisp',$loaisp)->with('choxacnhan',$choxacnhan)->with('tatca',$tatca)->with('huydon',$huydon)->with('danggiao',$danggiao)->with('stt',$stt);
    }
    public function huydon(Request $req)
    {
      $id=$req->id;
      $stt=0;
      $mahoadon=$req->mahoadon;
      // $makhachhang=$req->makhachhang;
      // $tenkh=$req->tenKH;
      // $sdt=$req->sdt;
      // $email=$req->email;
      // $gia = $req->gia;

      $thoigian=Carbon::now()->toDateString();  
        DB::table('hoadonban')->where('mahoadon',$mahoadon)->update(['xacnhan'=>'Hủy','ngayban'=>$thoigian]);
      $choxacnhan =DB::table("userkhachhang")
        ->join('hoadonban','hoadonban.id','userkhachhang.id')
        ->join('khachhang','hoadonban.makh','khachhang.makh')
        ->select('khachhang.sdt','khachhang.makh','khachhang.tenKH','userkhachhang.email','userkhachhang.id','hoadonban.*')
        ->where([
          ['hoadonban.id',$id],
          ['hoadonban.xacnhan','Chưa duyệt'],
          ])
        ->get();
        $huydon =DB::table("userkhachhang")
        ->join('hoadonban','hoadonban.id','userkhachhang.id')
        ->join('khachhang','hoadonban.makh','khachhang.makh')
        ->select('khachhang.sdt','khachhang.tenKH','userkhachhang.email','userkhachhang.id','hoadonban.*')
        ->where([
          ['hoadonban.id',$id],
          ['hoadonban.xacnhan','Hủy'],
          ])
        ->get();

         $tatca =DB::table("userkhachhang")
        ->join('hoadonban','hoadonban.id','userkhachhang.id')
        ->join('khachhang','hoadonban.makh','khachhang.makh')
        ->select('khachhang.tenKH','khachhang.sdt','userkhachhang.email','hoadonban.*')
                ->where(
          'hoadonban.id',$id,
          )
        ->get();

        $loaisp = DB::table("codeloai")->get();
      return view('donhang.donhangthaythe')->with('loaisp',$loaisp)->with('choxacnhan',$choxacnhan)->with('tatca',$tatca)->with('huydon',$huydon)->with('stt',$stt);
    }
}
