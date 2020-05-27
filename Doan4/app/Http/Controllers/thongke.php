<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use App\Charts\bieudo;
use Carbon\Carbon;
use Auth;
use DB;

class thongke extends Controller
{
    public function index(Request $req)
    {
        $doanhthu=0;
        $thongtingia=[];
        $t=0;
        $sl=[];
        $tongtientrongct=0;
        $layma=[];
        $tonggia=[];
        $tongtuantruoc;
        $tongthangtruoc;
        $tongtienhoadon;
                        // Auth::logout();
    	 $query=DB::table("codeloai");
    	$query=$query->select("*");
    	$data=$query->paginate(15);
    	$forngay=DB::table('hoadonban')->get();
    	$so=[];
    	$ngay=[];
    	foreach ($forngay as $key => $value) {
    		$date =\Carbon\Carbon::today()->subDays(7);
    		  $now = Carbon::now();
             $day= Carbon::now()->dayOfWeek;
            $tuan=$now->subDays($day);
    		$layngay=DB::table('hoadonban')
    		->where([
                ['ngayban','<=',$tuan ],
                ['ngayban', '>=', $date],
                ['xacnhan', 'Đã duyệt'],
                   ])
    		->get();
    	}	
        if(count($layngay))
        {
            foreach ($layngay as $key => $value) {
                $ct=DB::table('cthoadonban1')->where('mahoadon',$value->mahoadon)->SUM('soluong');
                // foreach ($ct as $key => $value) {
                $tongtuantruoc=DB::table('hoadonban')->where([
                ['ngayban','<=',$tuan ],
                ['ngayban', '>=', $date],
                ['xacnhan', 'Đã duyệt'],
                   ])->SUM('gia');
                    array_push($so,$ct);
                   array_push($ngay,$value->ngayban);
                // }
            }

                $layngay2=DB::table('hoadonban')
                ->join('cthoadonban1','hoadonban.mahoadon','cthoadonban1.mahoadon')
            ->where([
                ['ngayban','<=',$tuan ],
                ['ngayban', '>=', $date],
                ['xacnhan', 'Đã duyệt'],
                   ])
            ->select('cthoadonban1.masanpham','cthoadonban1.soluong','cthoadonban1.gia')->get();
            foreach ($layngay2 as $key => $value) {
                   $t=$value->soluong;
                   array_push($tonggia, $t);
                   array_push($layma, $value->masanpham);
               } 

               // dd($layma);
               foreach ($layma as $key => $value) {
                $tongtientuan =DB::table('cthd')->where('id',$value)->select('Gia')->get();
                   foreach ($tongtientuan as $key => $value) {
                       array_push($thongtingia, $value);
                   }
               }
               // foreach ($thongtingia as $key => $value1) {
               //     foreach ($tonggia as $key => $value) {
               //         $doanhthu=$value1*$value;
               //     }
               // }
               // dd($doanhthu);
               // dd($thongtingia);

            // foreach ($layngay2 as $key => $value) {
            //        $t=$value->soluong*$value->gia;
            //        array_push($tonggia, $t);
            //        array_push($layma, $value->masanpham);
            //    } 
            //    foreach ($layngay2 as $key => $value) {
            //        array_push($layma, $value->soluong);
            //    } 
            //    foreach ($tonggia as $key => $value) {
            //        $tongtientrongct+=$value;
            //    }
            //    foreach ($layma as $key => $value) {
            //        $tongtientuan =DB::table('cthd')->where('id',$value)->select('Gia')->get();
            //        foreach ($tongtientuan as $key => $value) {
            //            array_push($thongtingia, $value);
            //        }
                   
            //    }
            //    dd($thongtingia);
            //    $doanhthu= $tongtuantruoc-$tongtientrongct;
            //    dd($doanhthu);

        }
        else
        {
            $tongtuantruoc=0;
        }
    		

    		$chart = new bieudo;
    	$chart->labels($ngay);
    	$chart->dataset('Số lượng sản phẩm', 'line', $so)->options([
    		'color'=>'red',
    	]);

    	$so1=[];
    	$ngay1=[];
    	foreach ($forngay as $key => $value) {
    		$date =\Carbon\Carbon::today()->subDays(30);
    		// $now = Carbon::now()->toDateString();
            $now = Carbon::now();
             $day= Carbon::now()->day;
            $thang=$now->subDays($day);  
    		$layngay=DB::table('hoadonban')
    		->where([
                ['ngayban','<=',$thang],
                ['ngayban', '>=', $date],
                 ['xacnhan', 'Đã duyệt'],
                   ])
    		->get();
    	}	

    		foreach ($layngay as $key => $value) {
    			$ct=DB::table('cthoadonban1')->where('mahoadon',$value->mahoadon)->SUM('soluong');
    			// foreach ($ct as $key => $value) {
                $tongthangtruoc=DB::table('hoadonban')->where([
                ['ngayban','<=',$thang],
                ['ngayban', '>=', $date],
                 ['xacnhan', 'Đã duyệt'],
                   ])->SUM('gia');
    				array_push($so1,$ct);
    		       array_push($ngay1,$value->ngayban);
    			// }
    			
    		}		
    		$chart1 = new bieudo;
    	$chart1->labels($ngay1);
    	$chart1->dataset('Số lượng sản phẩm', 'line', $so1)->options([
    		'color'=>'red',
    	]);
        $datahd=DB::table('hoadonban')->where('xacnhan','=','chưa duyệt');


            // foreach ($layngay as $key => $value) {
            //     array_push($layma, $value->masanpham);
            // }
            // foreach ($layma as $key => $value) {
            //   $tongtienhoadon =DB::table('cthd')->where('id',$value)->SUM('Gia');
            //   array_push($tonggia, $tongtienhoadon);   
            // }

            // foreach ($tonggia as $key => $value) {
            //     $t+=$value;
            // }
            
            

    	return view('home.home',['chart'=>$chart,'data'=>$data,'chart1'=>$chart1,'tongtuantruoc'=>$tongtuantruoc,'tongthangtruoc'=>$tongthangtruoc]);
    }
}
