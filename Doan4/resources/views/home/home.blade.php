       @extends('layouts.dash')
       @section('section')
       <h2 style="    font-size: 60px;color: cornsilk;font-family: -webkit-body;text-align: center;">Bảng thống kê</h2>
       <div class="row">
        <div class="dashboard-wrapper col-4">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget" style="background: azure;">

                        <div class="text-center">
                         {!!$chart->container()!!}
                         <h4>Bản đồ thống kê số lượng được bán trong 1 tuần</h4>
                        </div>
                    </div>
                </div>
                <div >
                <div>
                    <span style="color: white">Doanh thu trong tuần :</span>
                    @if($tongtuantruoc!=null)
                    <span style="color: white">{{number_format($tongtuantruoc)}}đ</span>
                    @else
                    <span style="color: white">0đ</span>
                    @endif
                </div>
            </div>
            </div>
             <div class="dashboard-wrapper col-4">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget" style="background: azure;">

                        <div class="text-center">
                         {!!$chart1->container()!!}
                         <h4>Bản đồ thống kê số lượng được bán trong 1 tháng </h4>
                        </div>
                    </div>
                </div>
                 <div >
                <div>
                    <span style="color: white">Doanh thu trong tuần :</span>
                     @if($tongthangtruoc!=null)
                    <span style="color: white">{{number_format($tongthangtruoc)}}đ</span>
                    @else
                    <span style="color: white">0đ</span>
                    @endif
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
         {!! $chart->script() !!}
{!! $chart1->script() !!}
        @stop()