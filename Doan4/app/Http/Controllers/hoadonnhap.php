<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;

class hoadonnhap extends Controller
{

	  public function check()
    {
        $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
        $data1=DB::table("nhacungcap")->select('Mancc','Ten')->get();
        return view('hoadonnhap.chitiethoadon',compact('data','data1'));
    }
	 public function laythongtin(Request $req)
    {
    	 $layCTHD=DB::table('cthd')->get();
    	 $i=0;
        if($req->isMethod('post'))
        {
        $mahangsx=$req->input("mahangsx");
        $namencc=$req->input("name");
        $seryq=$req->input("sery");
        $laydata = DB::table('sanpham')->select('name','price','Mancc','id','masery')->where([
            ['masery',$seryq],
            ['Mancc',$mahangsx]
         ])->get();
         $data1=DB::table("nhacungcap")->select('Mancc','Ten')->get();
         $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
         if(!count($laydata))
         {
            return view('hoadonnhap.chitiethoadon',compact('data','data1','layCTHD','i'));  
         }
         else
         {
            return view('hoadonnhap.chitiethoadon_post',compact('laydata','data','namencc','layCTHD','i'));
         }
        }
    }
    //  public function themvao(Request $req,$id,$sery,$mancc,$tensp,$gia,$tenncc)
    // {
    //    //  $laydata = DB::table('sanpham')->select('name','price','Mancc','id','masery')->where([
    //    //      ['masery',$seryq],
    //    //      ['Mancc',$mancc]
    //    //   ])->get();
    //    //   $layCTHD=DB::table('cthd')->where('id',$id)->select('MaCTHD','id','Tensanpham','soluong','Gia')->get();

    //    // $data1=DB::table("nhacungcap")->select('Mancc','Ten')->where('Mancc',$mancc)->get();
    //    //   foreach ($layCTHD as $key => $value) {
    //    //       if($value->id!=$id)
    //    //       {
    //    //            $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
    //    //        DB::table('cthd')->insert([
    //    //      ['id'=>$id,'Tensanpham'=>$name,'soluong'=>$soluong,'Gia'=>$price,'Mancc'=>$mancc,'TenNCC'=>$tenncc]
    //    //  ]);
    //    //          $layCTHD=DB::table('cthd')->select('MaCTHD','id','Tensanpham','soluong','Gia')
    //    //   ->get();
    //    //    return view('hoadonnhap.chitiethoadon_all')->with('laydata', $laydata)->with('data', $data)->with('layCTHD', $layCTHD)->with('data1', $data1);
    //    //       }
    //    //       else
    //    //       {
    //    //             $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
    //    //           $sl=$value->soluong+$soluong;
    //    //           DB::table('cthd')->where('id',$id)->update(['soluong' => $sl]);
    //    //            $layCTHD=DB::table('cthd')->select('MaCTHD','id','Tensanpham','soluong','Gia')
    //    //   ->get();
    //    //    return view('hoadonnhap.chitiethoadon_all')->with('laydata', $laydata)->with('data', $data)->with('layCTHD', $layCTHD)->with('data1', $data1);
    //    //       }
    //      // }     
    // }
     public function themvao(Request $req,$id,$mancc,$tensp,$gia,$tenncc,$soluong)
    {
      $sl=0;
    	$danhsach=[];
    	$i=0;
    	$layCTHD=DB::table('cthd')->select('MaCTHD','id','Tensanpham','soluong','Gia')->get();
      $layCTHD1=DB::table('cthd')->where('id',$id)->select('soluong')->get();
    	foreach ($layCTHD as $key=>$value){
    		array_push($danhsach,$value->id);
    		// if(in_array($layCTHD, $id))
    		// {
    	 //     DB::table('cthd')->insert([
    	 //     	'Gia'=>$gia,'id'=>$id,'Mancc'=>$mancc,'soluong'=>$soluong,'TenNCC'=>$tenncc,'Tensanpham'=>$tensp,
    	 //     ]);
    	 //         $layCTHD=DB::table('cthd')->get();
      //            return view('hoadonnhap.chitiethoadon_them')->with('layCTHD',$layCTHD);
    		// }
    		// else
    		// {
    		// 	 $sl=$value->soluong+$soluong;
      //            DB::table('cthd')->where('id',$id)->update(['soluong' => $sl]);
      //            $layCTHD=DB::table('cthd')->get();
      //            return view('hoadonnhap.chitiethoadon_them')->with('layCTHD',$layCTHD);
    		// }
    	}
            foreach ($layCTHD1 as $key=>$value){
              $sl=$value->soluong;
            }
    	foreach ($danhsach as $item) {
    		if(!in_array($id,$danhsach)){
    			DB::table('cthd')->insert([
    	     	'Gia'=>$gia,'id'=>$id,'Mancc'=>$mancc,'soluong'=>$soluong,'TenNCC'=>$tenncc,'Tensanpham'=>$tensp,
    	     ]);
    	         $layCTHD=DB::table('cthd')->get();
                 return view('hoadonnhap.chitiethoadon_them')->with('layCTHD',$layCTHD)->with('i',$i);
    		}
    		else{
    				 
             DB::table('cthd')->where('id',$id)->update(['soluong' => $sl+$soluong]);
                 $layCTHD=DB::table('cthd')->get();
                 return view('hoadonnhap.chitiethoadon_them')->with('layCTHD',$layCTHD)->with('i',$i);
           
    			
    		}
    	}
    }
    public function checkdulieu($id,$sery,$mancc)
    {
    	     $laydata = DB::table('sanpham')->select('name','price','Mancc','id','masery')->where([
            ['masery',$sery],
            ['Mancc',$mancc]
         ])->get();
         // $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
         // $layCTHD=DB::table('cthd')->select('MaCTHD','id','Tensanpham','soluong','Gia')->get();
          $data1=DB::table("nhacungcap")->select('Mancc','Ten')->where('Mancc',$mancc)->get();
          foreach ($data1 as $key => $value) {
          	$tenncc=$value->Ten;
          }
         return view('hoadonnhap.chitiethoadon_check',compact('tenncc'))->with('laydata', $laydata);
    }

    function luuchititethoadon()
    {
      $soluong=[];
      $thoigian=Carbon::now();
      $sl=0;
      $mahdn="HDN".rand(1,1000);
      $layCTHD=DB::table('cthd')->get();
      foreach ($layCTHD as $key => $value) {
        if(!isset($value->idhd))
        {
         $sl+=$value->soluong;

        }
      }
      foreach ($layCTHD as $key => $value) {
        if(!isset($value->idhd))
        {
        DB::table('cthd')->where('idhd','=',null)->update(['idhd' => $mahdn]);
        }
      }
      if(isset($mahdn)){
         DB::table('hoadonnhap')->insert(['idhd' => $mahdn, 'tongsoluong' => $sl,'ngaynhap'=>$thoigian]);
        }
       $hoadonnhap=DB::table('hoadonnhap')->get();
       dd($hoadonnhap);
    }
    function HDNHAP()
    {
      $i=0;
       $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
              $data1= DB::table('hoadonnhap')->paginate(15);;
               return view('product.hoadonnhap',compact('data','i','data1'));
    }
    function laymangay($id)
    {
      $i=0;
       $data = DB::table('cthd')->where('idhd',$id)->get();
        return view('product.chitiethoadon',compact('data','i'));
    }
}
