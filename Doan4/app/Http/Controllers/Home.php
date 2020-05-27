<?php

namespace App\Http\Controllers;
use App\sanpham;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use DB;

class Home extends Controller
{
    public function index(Request $req)
    {

    	$query=DB::table("codeloai");
    	//$query=$query->orderBy("id","name","price","image","code","sale","comment","introduce");
    	$query=$query->select("*");
    	$data=$query->paginate(15);

        // $data1 =DB::table("codeloai")
        // ->join('sanpham','sanpham.code','codeloai.code')
        // ->select('sanpham.*','codeloai.code','codeloai.nameLoai')
        // ->get();

        // $data1 = DB::table('sanpham')->where('code', $req->id)->first();
        return view('home.home',compact('data'));
    }
    public function add(Request $request)
    {
        $query=DB::table("codeloai");
        $query=$query->select("*");
        $data=$query->paginate(15);
        $data1=DB::table("nhacungcap")->select('Mancc','Ten')->get();
    	return view('product.add',compact('data','data1'));
    }
    public function add_laydulieuve(Request $request)
    {
        if($request->isMethod('post'))
        {
            $name = $request->input("name");
            $sery = $request->input("sery");
            $mahangsx= $request->input("mahangsx");
            $maloai=$request->input("maloai");
            $image =$request->input("image");
            $noidung =$request->input("noidung");
            $thongso =$request->input("thongso");
            $price =$request->input("price");
            $datebatdau =$request->input("datebatdau");
            $dateketthuc =$request->input("dateketthuc");
            $chietkhau =$request->input("chietkhau");
            $image1=explode ( '/' , $image);
            DB::table('sanpham')->insert([
                ['code'=>$maloai,'code'=>$maloai,'name'=>$name,'price'=>$price,'image'=>$image1[6],'sale'=>$chietkhau,'introduce'=>$noidung,'time'=>$datebatdau,'masery'=>$sery,'thongso'=>$thongso,'ngayketthuc'=>$dateketthuc]
            ]);

            return Redirect::to("/product/view/$maloai");
        }
    }
    public function view(Request $req){
        $data1 = DB::table('sanpham')->select('image','name','price','id','code')->where('code', $req->id)->paginate(5);
        // $query=DB::table("codeloai");
        // $data=$query->select("*");
        // $data=$query->paginate(6);
        $i=1;
        $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
        return view('product.sanpham',compact('data1','data','i'));
    }

    public function edit(Request $req){
        $dataedit = DB::table('sanpham')->select('image','name','price','id','code')->where('id', $req->id)->get();
        $query=DB::table("codeloai");
        $query=$query->select("*");
        $data=$query->paginate(15);
        return view('product.edit',compact('dataedit','data'));
    }
    public function update(Request $req){
         if($req->isMethod('post'))
        {
            $code =$req->input("code");
            $id = $req->input("ma");
            $name = $req->input("name");
            $Price = $req->input("Price");
            DB::table('sanpham')->where('id',$id)->update(['name'=>$name,'price'=>$Price]);
            return Redirect::to("/product/view/$code");
        }
    }
    public function delete(Request $req,$id,$code){
        // $id=isset($_POST["id"])? $_POST["id"]:0;
        // $id=$req->id;
        // echo $id;
        $i=0;
        DB::table('cthd')->where('id',$id)->delete();
        // if($id>0){  
            DB::table('sanpham')->where('id',$id)->delete();
           $data1= DB::table('sanpham')->where('code',$code)->get();
            return view('product.sanphamtimkiem',compact('data1','i'));
        // }
    }

    //Hóa đơn

    // public function get_cthd()
    // {
    //     $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
    //     $data1=DB::table("nhacungcap")->select('Mancc','Ten')->get();
    //     return view('hoadonnhap.chitiethoadon',compact('data','data1'));
    // }

    // public function post_cthd(Request $req)
    // {
    //     if($req->isMethod('post'))
    //     {

    //     $mahangsx=$req->input("mahangsx");
    //     $namencc=$req->input("name");
    //     $seryq=$req->input("sery");
    //     $laydata = DB::table('sanpham')->select('name','price','Mancc','id','masery')->where([
    //         ['masery',$seryq],
    //         ['Mancc',$mahangsx]
    //      ])->get();
    //      $data1=DB::table("nhacungcap")->select('Mancc','Ten')->get();
    //      $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
    //      if(!count($laydata))
    //      {
    //         return view('hoadonnhap.chitiethoadon',compact('data','data1'));  
    //      }
    //      else
    //      {
    //         return view('hoadonnhap.chitiethoadon_post',compact('laydata','data','namencc'));
    //      }
    //     }
    // }
    //  public function post_cthd_all(Request $req)
    // {

    //     if($req->isMethod('post'))
    //     {
    //     $tenncc=$req->input("tenncc");
    //     $seryq=$req->input("sery");
    //     $mancc=$req->input("ncc");
    //     $id=$req->input("id");
    //     $name=$req->input("name");
    //     $soluong=$req->input("soluong");
    //     $price=$req->input("price");
    //     $sl=0;
         
    //     $laydata = DB::table('sanpham')->select('name','price','Mancc','id','masery')->where([
    //         ['masery',$seryq],
    //         ['Mancc',$mancc]
    //      ])->get();
    //      $layCTHD=DB::table('cthd')->where('id',$id)->select('MaCTHD','id','Tensanpham','soluong','Gia')->get();
    //    $data1=DB::table("nhacungcap")->select('Mancc','Ten')->where('Mancc',$mancc)->get();
    //      foreach ($layCTHD as $key => $value) {
    //          if($value->id!=$id)
    //          {
    //               $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
    //           DB::table('cthd')->insert([
    //         ['id'=>$id,'Tensanpham'=>$name,'soluong'=>$soluong,'Gia'=>$price,'Mancc'=>$mancc,'TenNCC'=>$tenncc]
    //     ]);
    //             $layCTHD=DB::table('cthd')->select('MaCTHD','id','Tensanpham','soluong','Gia')
    //      ->get();
    //       return view('hoadonnhap.chitiethoadon_all')->with('laydata', $laydata)->with('data', $data)->with('layCTHD', $layCTHD)->with('data1', $data1);
    //          }
    //          else
    //          {
    //                $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
    //              $sl=$value->soluong+$soluong;
    //              DB::table('cthd')->where('id',$id)->update(['soluong' => $sl]);
    //               $layCTHD=DB::table('cthd')->select('MaCTHD','id','Tensanpham','soluong','Gia')
    //      ->get();
    //       return view('hoadonnhap.chitiethoadon_all')->with('laydata', $laydata)->with('data', $data)->with('layCTHD', $layCTHD)->with('data1', $data1);
    //          }
    //      }



          
    //     // return view('hoadonnhap.chitiethoadon_all')->with('laydata', $laydata)->with('data', $data)->with('layCTHD', $layCTHD)->with('data1', $data1);
         

    //       // dd($layCTHD);
    //     // return view('hoadonnhap.chitiethoadon_all',compact('laydata','data','layCTHD'));
        
    //     }
    // }
    //       public function post_cthd_all1(Request $req)
    //     {
    //     if($req->isMethod('post'))
    //     {
    //      // $tenncc=$req->input("tenncc");
    //     $seryq=$req->input("sery");
    //     $mancc=$req->input("ncc");
    //     $id=$req->input("id");
    //     // $name=$req->input("name");
    //     // $soluong=$req->input("soluong");
    //     // $price=$req->input("price");
    //     $laydata = DB::table('sanpham')->select('name','price','Mancc','id','masery')->where([
    //         ['masery',$seryq],
    //         ['Mancc',$mancc]
    //      ])->get();
    //      $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
    //      $layCTHD=DB::table('cthd')->select('MaCTHD','id','Tensanpham','soluong','Gia')->get();
    //       $data1=DB::table("nhacungcap")->select('Mancc','Ten')->where('Mancc',$mancc)->get();
    //      return view('hoadonnhap.chitiethoadon_all1')->with('laydata', $laydata)->with('data', $data)->with('layCTHD', $layCTHD)->with('data1', $data1);

    //     }
    // }
    //   public function post_cthd_all_add(Request $req)
    // {  
    //     if($req->isMethod('post'))
    //     {
    //     $id=isset($_POST["id"])? $_POST["id"]:0;
    //     $sery=isset($_POST["sery"])? $_POST["sery"]:0;
    //     $mancc=isset($_POST["mancc"])? $_POST["mancc"]:0;
    //     $ten=isset($_POST["tensp"])? $_POST["tensp"]:0;
    //     $gia=isset($_POST["gia"])? $_POST["gia"]:0;
    //     $tenncc=isset($_POST["tenncc"])? $_POST["tenncc"]:0;
    //     $soluong=isset($_POST["soluong"])? $_POST["soluong"]:0;
    //     $sl=0;

    //     $layCTHD=DB::table('cthd')->where('id',$id)->select('MaCTHD','id','Tensanpham','soluong','Gia')->get();

    //      foreach ($layCTHD as $key => $value) {
    //          if($value->id!=$id)
    //          {
    //              DB::table('cthd')->insert([
    //         ['id'=>$id,'Tensanpham'=>$ten,'soluong'=>$soluong,'Gia'=>$gia,'Mancc'=>$mancc,'TenNCC'=>$tenncc]]);
    //          }
    //          else
    //          {
    //             $sl=$value->soluong+$soluong;
    //               DB::table('cthd')->where('id',$id)->update(['soluong' => $sl]);     
    //          }
    //      }
    //     }
    // }

        public function timkiem(Request $req,$nameprice,$code)
    {
        $data1=DB::table('sanpham')->where([
            ['name','LIKE','%'.$nameprice.'%'],
            ['code',$code],
        ])->orWhere([
            ['price','LIKE','%'.$nameprice.'%'],
            ['code',$code],
        ])->paginate(15);
        $i=0;
        $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
        return view("product.sanphamtimkiem")->with('data',$data)->with('data1',$data1)->with('i',$i);
    }

    public function nhacungcap()
    {
        $i=0;
        $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
        $data1 = DB::table('nhacungcap')->paginate(15);
           return view("Home.ncc")->with('data',$data)->with('data1',$data1)->with('i',$i);
    }
    public function nhacungcapthem(Request $req,$mancc,$ten,$sdt)
    {
        $i=0;
        DB::table('nhacungcap')->insert([['Mancc'=>$mancc,'Sdt'=>$sdt,'Ten'=>$ten]]);

        $data1 = DB::table('nhacungcap')->paginate(15);

         return view("Home.nccthem")->with('data1',$data1)->with('i',$i);
    }

    public function nhacungcapdelete($id)
    {
         $i=0;
        DB::table('nhacungcap')->where('id',$id)->delete();
         $data1 = DB::table('nhacungcap')->paginate(15);
         return view("Home.nccthem")->with('data1',$data1)->with('i',$i);
    }
}
