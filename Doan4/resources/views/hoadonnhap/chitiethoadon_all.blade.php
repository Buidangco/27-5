       @extends('layouts.dash')
       @section('section')
        <div class="dashboard-wrapper" style="margin-left: 320px">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                  
                    </div>

                    <div class="ecommerce-widget">

                        <div style="border-bottom: 1px solid black" class="row">
                          <h2>Quản lý hóa đơn nhập</h2>
                        </div>
                        @foreach($laydata as $da)
                        <form style="margin-top: 40px;margin-bottom: 40px" action="/product/CTHD2" method="post">
                          @csrf
                          <label>Mã sery sản phẩm</label>
                          <input type="text" value="{{$da->id}}" style="display: none;" name="id">
                          <input type="text" value="{{$da->masery}}" name="sery">
                           <input value="{{$da->Mancc}}" type="text" style="display: none;" name="ncc">
                            <input type="submit" value="check" style="color: white;background-color:#24315f ">
                         </form>
                             @foreach($data1 as $row1)
                           <input type="text" value="{{$row1->Ten}}" style="display: none;" name="tenncc">
                        @endforeach
                         <div style="    margin-left: 344px;margin-bottom: 3px;position: absolute;top: 176px;}">
                         <label style="margin-left: 100px">Tên sản phẩm</label>
                          <input value="{{$da->name}}" type="text" name="name">
                          <label style="margin-left: 30px">Số lượng</label>
                          <input  style="width: 50px" type="text" id="soluong" name="soluong">
                          <label style="margin-left: 30px">Đơn giá</label>
                          <input value="{{$da->price}}" type="text" name="price">
                          <input type="submit" onclick="Them('{{$da->id}}','{{$da->masery}}','{{$da->Mancc}}','{{$da->name}}','{{$da->price}}','{{$row1->Ten}}')" value="Thêm" style="color: white;background-color:#24315f ">
                          </div>
                          @endforeach
                        <div class="row">
                           
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                  
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0" style="background-color: #24315f">
                                                        <th class="border-0" style="color: white">STT</th>
                                                        <th class="border-0" style="color: white">Mã CTHD</th>
                                                        <th class="border-0" style="color: white">Mã sản phẩm</th>
                                                         <th class="border-0" style="color: white">Tên SP</th>
                                                        <th class="border-0" style="color: white">Số lượng</th>
                                                        <th class="border-0" style="color: white">Giá</th>      
                                                        <th class="border-0" style="color: white">Sửa </th>
                                                        <th class="border-0" style="color: white">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($layCTHD as $layct)
                                                    <tr>
                                                        <td>stt</td>
                                                        <td>{{$layct->MaCTHD}}</td>
                                                        <td>{{$layct->id}}</td>
                                                        <td>{{$layct->Tensanpham}}</td>
                                                        <td>{{$layct->soluong}}</td>
                                                        <td><span>{{number_format($layct->Gia)}}</span></td>
                                                        <td>
                                                          <a href="" class="btn btn-default btn-rounded mb-4"><i class="fas fa-edit"></i></a>
                                                      </td>
                                                        <td><a onclick="" class="btn btn-default btn-rounded mb-4"><i class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                     @endforeach
                                                    <tr>
                                                        <td colspan="9"><button>Lưu</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
       <script>
          function Them(id,sery,mancc,tensp,gia,tenncc) {
            alert(id);
            // var soluong=$('#soluong').val();
            //  var link="{{url('/product/CTHDadd/')}}";
            //     $.ajax({
            //       type:"post",
            //         url:link,
            //         data:{
            //             'id':id,
            //             'sery':sery,
            //             'mancc':mancc,
            //             'tensp':tensp,
            //             'gia':gia,
            //             'tenncc':tenncc,
            //             'soluong':soluong,
            //             '_token':'{{csrf_token()}}',
            //         },
            //         error:function(xhr,status,errorThrow){
            //             alert(errorThrow);
            //         },
            //         success:function(data){
            //             location.reload();
            //         }
            //     })
            }
       </script>

        @stop()