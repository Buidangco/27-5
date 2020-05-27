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

                        <div style="border-bottom: 1px solid black" class="row">
                          <h2 style="color: black;font-size: 46px;">Quản lý hóa đơn nhập</h2>
                        </div>
                        <form style="margin-top: 40px;margin-bottom: 40px" action="/product/CTHD" method="post">
                          @csrf
                           <select class="custom-select custom-select-lg mb-3" name="mahangsx" style="color: black;
    font-size: 23px;
    height: 46px;">
                                 @foreach($data1 as $d1)

                            <option value="{{$d1->Mancc}}">{{$d1->Ten}}</option>
                             
                            @endforeach
                          </select>
                           @foreach($data1 as $d1)
                           <input type="text" style="display: none;" value="{{$d1->Ten}}" name="name">
                           @endforeach
                          <label style="    font-size: 20px;color: black;">Mã sery sản phẩm</label>
                          <input type="text" value="" name="sery">
                           <input type="submit" value="check" style="color: white;background-color:#24315f "></button>
                        </form>
                         <div style="    margin-left: 344px;margin-bottom: 3px;position: absolute;top: 236px;}">
                         <label style="margin-left: 100px;font-size: 20px;color: black;">Tên sản phẩm</label>
                          <input type="text" name="">
                          <label style="margin-left: 30px;font-size: 20px;color: black;">Số lượng</label>
                          <input style="width: 50px" type="text" name="">
                          <label style="margin-left: 30px;font-size: 20px;color: black;">Đơn giá</label>
                          <input type="text" name="">
                          <input type="submit" value="Thêm" style="color: white;background-color:#24315f ">
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
       
        @stop()