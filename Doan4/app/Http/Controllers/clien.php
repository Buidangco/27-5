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
use Carbon\Carbon;
class clien extends Controller
{
    public function Home(Request $req)
    {
    	 $code=isset($_POST["code"])? $_POST["code"]:0;
         $list_product=DB::table("sanpham")
         
         ->join('cthd','sanpham.id','cthd.id')
         ->select('sanpham.*','cthd.soluong')
         ->paginate(15);
         $list_product1=DB::table("sanpham")->get();
        $loaisp = DB::table("codeloai")->get();

        //  $data1 =DB::table("hoadonban")
        // ->join('cthoadonban1','hoadonban.mahoadon','cthoadonban1.mahoadon')
        // ->join('sanpham','cthoadonban1.masanpham','sanpham.id')
        // ->select('sanpham.*','hoadonban.xacnhan')
        // ->where([['hoadonban.xacnhan','Đã duyệt'],['cthoadonban1.soluong','>=',3]])
        // ->get();

        
        // $thoigia1=Carbon::now();
        //  // $day= Carbon::now()->dayOfWeek;
        //  $day=(8-Carbon::now()->dayOfWeek);
        //  $cuoituan=($day+7);
        //  $tuan=$thoigia->addDays($day);
        //  $cuoituan1=$thoigia1->addDays($cuoituan);
         // $thoigian=Carbon::now();
         $thoigian=Carbon::tomorrow();
         $data1 =DB::table("sanpham")->where(
            // [
            'time','=',$thoigian
            // ['time','<=',$cuoituan1]
        // ]
    )->get();
        // $data1 =DB::table("sanpham")-
    	return view('layout_sanpham.layout_body')->with('loaisp',$loaisp)
        ->with('data1',$data1)
        ->with('list_product',$list_product)->with('list_product1',$list_product1);
    }
    // public function Home(Request $req)
    // {
    // 	 $code=isset($_POST["code"])? $_POST["code"]:0;
    // 	  $data1 =DB::table("hoadonban")
    //     ->join('sanpham','sanpham.id','hoadonban.id')
    //     ->select('sanpham.*')
    //     ->get();
    //      $list_product=DB::table("sanpham")->paginate(15);
    //      $list_product1=DB::table("sanpham")->get();
    //     $loaisp = DB::table("codeloai")->get();

    // 	return view('layout_sanpham.layout_body')->with('data1',$data1)->with('loaisp',$loaisp)->with('list_product',$list_product)->with('list_product1',$list_product1);
    // }
    public function post_loai(Request $req){
    	 $id=$req->code;
    	 $code=isset($_POST["code"])? $_POST["code"]:0;
    	  // $data1 =DB::table("hoadonban")
       //  ->join('sanpham','sanpham.id','hoadonban.id')
       //  ->select('sanpham.*')
       //  ->get();
        $list_product=DB::table("sanpham")->where('code',$id)->paginate(15);
        $loaisp = DB::table("codeloai")->get();
         $list_product1=DB::table("sanpham")->get();
          $data1 =DB::table("hoadonban")
        ->join('cthoadonban1','hoadonban.mahoadon','cthoadonban1.mahoadon')
        ->join('sanpham','cthoadonban1.masanpham','sanpham.id')
        ->select('sanpham.*','hoadonban.xacnhan')
        ->where([['hoadonban.xacnhan','Đã duyệt'],['cthoadonban1.soluong','>=',3]])
        ->get();
    	return view('layout_sanpham.layout_body')
    	// ->with('data1',$data1)
    	->with('loaisp',$loaisp)->with('list_product',$list_product)->with('list_product1',$list_product1)->with('data1',$data1);
    }

    public function chitiet(Request $req)
    {
    	$id=$req->id;
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
            return view('chitietsanpham.chitiet')->with('loaisp',$loaisp)->with('list_product1',$list_product1)->with('sanpham_ct',$sanpham_ct)->with('sanpham_ct1',$sanpham_ct1)->with('binhluan',$binhluan)->with('loaisp',$loaisp);   	
    }
//danh sách sản phẩm
    public function price(Request $req,$price,$code){
    	 $data=DB::table("sanpham")->where([
    ['code',$code],
    ['price', '<=', $price],
])->paginate(15);
    	 return view('danhsachsanpham.danhsachsanpham_gia')->with('data',$data);
    }

     public function mausac(Request $req,$mausac,$code){
    	 $data=DB::table("sanpham")->where([
    ['code',$code],
    ['mausac',$mausac],
])->paginate(15);
    	 return view('danhsachsanpham.danhsachsanpham_mau')->with('data',$data);
    }
//chi tiết
    public function savelist(Request $req,$id,$quanty)
    {
    	    	$product=DB::table('sanpham')->where('id',$id)->first();
    	if($product != null){
    		$oldcart= Session('Cart')?Session('Cart'):null;
    		$newCart= new Cart($oldcart);
    		$newCart->AddCart1($product,$id,$quanty);

    		$req->Session()->put('Cart',$newCart);
    	}
    	 //  $oldcart= Session('Cart') ? Session('Cart'):null;
    		// $newCart= new Cart($oldcart);
    		// $newCart->saveItemCart($id,$quanty);
      //      $req->Session()->put('Cart',$newCart);
    	return view('chitietsanpham.chitiet_sl');
    }
//giỏ hàng
    public function AddCart(Request $req,$id){

    	$product=DB::table('sanpham')->where('id',$id)->first();
    	if($product != null){
    		$oldcart= Session('Cart')?Session('Cart'):null;
    		$newCart= new Cart($oldcart);
    		$newCart->AddCart($product,$id);

    		$req->Session()->put('Cart',$newCart);
    	}
    	return view('trangchu.cart');
    }
    public function DeleteItemCart(Request $req,$id){
    	    $oldcart= Session('Cart') ? Session('Cart'):null;
    		$newCart= new Cart($oldcart);
    		$newCart->DeleteItemCart($id);
    		if(Count($newCart->products)>0)
    		{
    			$req->Session()->put('Cart',$newCart);
    		}
    		else
    		{
    			$req->Session()->forget('Cart');
    		}
    	return view('trangchu.cart');
    }

    public function List_cart(){
    	  $loaisp = DB::table("codeloai")->get();
    	return view('checkout.index')->with('loaisp',$loaisp);
    }

    public function DeletelistItemCart(Request $req,$id){
    	    $oldcart= Session('Cart') ? Session('Cart'):null;
    		$newCart= new Cart($oldcart);
    		$newCart->DeleteItemCart($id);
    		if(Count($newCart->products)>0)
    		{
    			$req->Session()->put('Cart',$newCart);
    		}
    		else
    		{
    			$req->Session()->forget('Cart');
    		}
    	return view('trangchu.list_Cart');
    }

   public function savelistItemCart(Request $req,$id,$quanty)
    {
    	  $oldcart= Session('Cart') ? Session('Cart'):null;
    		$newCart= new Cart($oldcart);
    		$newCart->saveItemCart($id,$quanty);
           $req->Session()->put('Cart',$newCart);
    	return view('trangchu.list_Cart');
    }


//đặt hàng
    // public function Dathang(Request $req){
    // 	 $oldcart= Session('Cart') ? Session('Cart'):null;
    // 	$cthd= DB::table('cthd')->select('soluong','id')->get();
    // 	 $makh="kh".rand(1,1000);
    // 	 $tenkh=$req->ten;
    // 	 $email=$req->email;
    // 	 $sdt=$req->sdt;
    // 	 $diachi=$req->diachi;
    // 	 $phai=$req->phai;
    //      // $idtk=$req->idtk;
    //       $idtk=isset($_POST["idtk"])? $_POST["idtk"]:0;
          
    // 	 $thongtin['info']=$req->all();
    // 	 // $thongtin1=$req->all();
    	 
    // 	// return Excel::download(['Tên khách hàng'=>$tenkh,],'thongtin.xlsx');    
    // 	 Mail::send('muahang.email',$thongtin, function ($message) use ($email)
    // 	  {
    //      $message->from('kiemtienonline19c@gmail.com', 'Đăng Cơ');
         
    //       $message->to($email,$email);
    //       // $message->cc('trandangtrung@gmail.com','Trần trung');
    //       $message->subject('Xác nhận hóa đơn mua hàng từ shop');
    //  	 });
    //     $mahoadon="HD".rand(1,1000);
    //      $tongsl=$oldcart->totalQuanty;
    //      $tongtien=$oldcart->totalPrice;
    //      $ngay=date('Y-m-d');
    //       DB::table('khachhang')->insert( [['makh' => $makh,'tenKh' => $tenkh, 'Sdt' => $sdt, 'diachi' => $diachi, 'email' => $email ,'phai' => $phai],]);
    //  DB::table('hoadonban')->insert([['mahoadon' => $mahoadon,'makh' => $makh,'gia' => $tongtien, 'ngayban' => $ngay,'xacnhan' => 'Chưa duyệt','id' => $idtk],]);
    //      foreach ($oldcart->products as $key=>$value) {
    //         $id=$key;
    //         $soluong=$value['quanty'];
    //         $ten=$value['productinfo']->name;
    //         $gia=$value['productinfo']->price;
    //         DB::table('cthoadonban1')->insert( [['mahoadon' => $mahoadon,'soluong' => $soluong, 'Gia' => $gia, 'masanpham' => $id],]);
    //         foreach ($cthd as $key => $value) {
    //         $soluong1=$value->soluong;
    //         DB::table('cthd')
    //           ->where('id', $id)
    //           ->update(['soluong' => $soluong1-$soluong]);
    //         }
    //      }
        
    	
    // 	 $req->Session()->forget('Cart');
    // 	 return Redirect()->back()->with('Thông báo','Đặt hàng thành công')
    //      // ->Excel::download(new UsersExport,'thongtin.xlsx')
    //      ;
    // }
     public function Dathang(Request $req){
         $oldcart= Session('Cart') ? Session('Cart'):null;

         $makh="kh".rand(1,1000);
         $tenkh=$req->ten;
         $email=$req->email;
         $sdt=$req->sdt;
         $diachi=$req->diachi;
         $phai=$req->phai;
         $idtk=isset($_POST["idtk"])? $_POST["idtk"]:0;
         $thongtin['info']=$req->all();

         Mail::send('muahang.email', $thongtin, function ($message) use ($email)
          {
         $message->from('buidangco09@gmail.com','Đăng Cơ');

          $message->to($email,$email);

          $message->cc('trandangtrung@gmail.com','Trần trung');

          $message->subject('Xác nhận hóa đơn mua hàng từ shop');

      });
          DB::table('khachhang')->insert( [['makh' => $makh,'tenKh' => $tenkh, 'Sdt' => $sdt, 'diachi' => $diachi, 'email' => $email ,'phai' => $phai],]);
          $mahoadon="HD".rand(1,1000);
         $tongsl=$oldcart->totalQuanty;
         $tongtien=$oldcart->totalPrice;
         $ngay=date('Y-m-d');

         DB::table('hoadonban')->insert( [['mahoadon' => $mahoadon,'makh' => $makh,'gia' => $tongtien, 'ngayban' => $ngay,'xacnhan' => 'Chưa duyệt','id' => $idtk,'tongsl'=>$tongsl,'trangthai'=>'Chưa giao hàng']]);
         $soluonga=[];
         foreach ($oldcart->products as $key=>$value) {
            $id=$key;
            $soluong=$value['quanty'];
            $ten=$value['productinfo']->name;
            $gia=$value['productinfo']->price;
            DB::table('cthoadonban1')->insert( [['mahoadon' => $mahoadon,'soluong' => $soluong, 'Gia' => $gia, 'masanpham' => $id],]);
            $cthd= DB::table('cthd')->where('id',$id)->select('soluong','id')->get();
            foreach ($cthd as $key => $value) {
                array_push($soluonga, $value->soluong);
            }
            foreach ($soluonga as $key => $value) {
                DB::table('cthd')
              ->where('id', $id)
              ->update(['soluong' => $value-$soluong]);
            }
         }
         $req->Session()->forget('Cart');

         return Redirect()->back()->with('Thông báo','Đặt hàng thành công');
    }

    public function binhluan(Request $req){
       
        $id=$req->id;
        $idauth=$req->idauth;
        $binhluan=$req->binhluan;
        // $ngay=Carbon::now()->toDateString();
        $ngay=Carbon::now();
        DB::table('binhluan')->insert([
            ['idbl'=>$id,'binhluan'=>$binhluan,'ngay'=>$ngay,'idauth'=>$idauth],
        ]);
        $binhluan=DB::table('userkhachhang')
        ->join('binhluan','binhluan.idauth','userkhachhang.id')
        ->join('sanpham','sanpham.id','binhluan.idbl')
        ->where('sanpham.id',$id)
        ->select('userkhachhang.*','binhluan.binhluan','binhluan.ngay')
        ->get();
        return view('chitietsanpham.binhluan')->with('binhluan',$binhluan);
    }

    function chonloai(Request $req,$id){
        $list_product=DB::table("sanpham")->where('code',$id)->paginate(15);
                $loaisp = DB::table("codeloai")->get();
        return view('layout_sanpham.danhsachmoi')->with('list_product',$list_product)->with('loaisp',$loaisp);
    }

    function chonloai1(Request $req,$id){
        $list_product=DB::table("sanpham")->where('code',$id)->paginate(15);
                $loaisp = DB::table("codeloai")->get();
        return view('layout_sanpham.danhsachmoi1')->with('list_product',$list_product)->with('loaisp',$loaisp);
    }
}
