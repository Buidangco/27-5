       @extends('layouts.dash')
       @section('section')
        <div class="dashboard-wrapper" style="margin-left: 320px">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                      <div  id="check">
                         <div style="border-bottom: 1px solid black" class="row">
                          <h2 style="color: black;font-size: 46px;">Quản lý hóa đơn nhập</h2>
                        </div>
                        @foreach($laydata as $da)
                        <form style="margin-top: 40px;margin-bottom: 40px">
                          @csrf
                          <label style="    font-size: 20px;color: black;">Mã sery sản phẩm</label>
                            <input type="" value="{{$namencc}}" id="tenncc" style="display: none;" name="tenncc">
                          <input type="text" value="{{$da->id}}" id="id" style="display: none;" name="id">
                           <input value="{{$da->Mancc}}" id="mancc" type="text" style="display: none;" name="ncc">
                          <input type="text" id="sery" value="{{$da->masery}}" style="color: black;" name="sery">
                           <input type="button" onclick="check()" value="check" style="color: white;background-color:#24315f ">
                        <label style="margin-left: 100px;font-size: 20px;color: black;">Tên sản phẩm</label>
                          <input value="{{$da->name}}" style="color: black;" id="name" type="text" name="name">
                          <label style="margin-left: 30px;font-size: 20px;color: black;">Số lượng</label>
                          <input  style="width: 50px" style="color: black;" type="text" id="soluong" name="soluong">
                          <label style="margin-left: 30px;font-size: 20px;color: black;">Đơn giá</label>
                          <input value="{{$da->price}}" style="color: black;" id="gia" type="text" name="price">
                     
                           <input type="button" onclick="Them()" value="Thêm" style="color: white;background-color:#24315f ">
                        </form>
                          @endforeach
                      </div>
                       
                          <div class="row" id="row">
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
                                                        <td>{{$i++}}</td>
                                                        <td>{{$layct->MaCTHD}}</td>
                                                        <td id="dalay">{{$layct->id}}</td>
                                                        <td>{{$layct->Tensanpham}}</td>
                                                        <td >{{$layct->soluong}}</td>
                                                        <td><span>{{number_format($layct->Gia)}}</span></td>
                                                        <td>
                                                          <a href="" class="btn btn-default btn-rounded mb-4"><i class="fas fa-edit"></i></a>
                                                      </td>
                                                        <td><a onclick="" class="btn btn-default btn-rounded mb-4"><i class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                     @endforeach
                                                    <tr>
                                                        <td colspan="9"><button onclick="lucthd()">Lưu</button></td>
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
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
       <script type="text/javascript">
         function Them()
         {
          let id=$('#id').val();
          let mancc=$('#mancc').val();
          let tensp=$('#name').val();
          let gia=$('#gia').val();
          let tenncc=$('#tenncc').val();
           let soluong=$('#soluong').val();
          $.ajax({
            type:'GET',
            url:'/product/CTHD/them/'+id+'/'+mancc+'/'+tensp+'/'+gia+'/'+tenncc+'/'+soluong,
          }).done(function(response){
              $("#row").empty();
                $("#row").html(response);
            });
         }
         function check()
         {
          let sery=$('#sery').val();
           let mancc=$('#mancc').val();
         let id=$('#id').val();
         let tenncc=$('#tenncc').val();
          $.ajax({
            type:'GET',
            url:'/product/CTHD/check/'+id+'/'+sery+'/'+mancc,
          }).done(function(response){
            $("#check").empty();
            $("#check").html(response);
          });
         }

         function lucthd()
         {
          $.ajax({
            type:'GET',
            url:'/hoadonmua'
          }).done(function(response){
            
          })
         }
       </script>
        @stop()