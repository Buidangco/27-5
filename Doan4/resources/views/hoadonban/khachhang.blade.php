       @extends('layouts.dash')
       @section('section')
  
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    </div>
                     <div class="text-center"><input id="nameprice" type="text" placeholder="Search here...">
                                    <button onclick="timkiemsanpham()"><i class="fa fa-search"></i></button></div>
                                    <div style="opacity:0;" id="nho"></div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div style="    margin-top: -90px;
    margin-left: 2px;" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Recent Orders</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                                <table class="table table-bordered table-striped" style="height: 600px">
                                                <thead class="bg-light">
                                                    <tr style="    font-size: 24px;background-color: #2a4d69;">
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">STT</th>
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">Tên khách hàng</th>
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">Số điện thoại</th>
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">Địa chỉ</th> 
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">Email</th> 
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">Phái</th>      
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;text-align: center;color: aliceblue;">Sửa </th>
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;text-align: center;color: aliceblue;">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	@foreach($data1 as $row)
                                                    <tr>
                                                        <td style="color: red;">{{$i++}}</td>
                                                        <td>{{$row->tenKh}}</td>
                                                        <td>{{$row->Sdt}}</td>
                                                        <td>{{$row->diachi}}</td>
                                                        <td>{{$row->email}}</td>
                                                        <td>{{$row->phai}}</td>
                                                        <td style="text-align: center;">
                                                          <a style="background: chocolate;" href="{{route('/product/edit',$row->makh)}}" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-edit"></i></a>
                                                      </td>
                                                        <td style="text-align: center;"><a style="background: chocolate;" onclick="deletesanpham('{{$row->makh}}')" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-trash-alt"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            Tổng số trang{!!$data1->lastPage()!!}
                                        <nav style="    text-align: right;" aria-label="Page navigation example">
                                            <ul class="pagination">
                                            @if($data1->currentPage()!=1)
                                             <li class="page-item"><a class="page-link" href="{!!$data1->url($data1->currentPage()-1)!!}">Previous</a></li>
                                             @endif
                                             @for($i=1;$i<=$data1->lastPage();$i=$i+1)
                                            <li class="page-item {!!($data1->currentPage()==$i) ? 'active':''!!}"><a class="page-link" href="{!!str_replace('/?','/?',$data1->url($i))!!}">{!!$i!!}</a></li>
                                            @endfor
                                            @if($data1->currentPage()!=$data1->lastPage())
                                            <li class="page-item"><a class="page-link" href="{!!$data1->url($data1->currentPage()+1)!!}">Next</a></li>
                                            @endif
                                            </ul>
                                        </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

    
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <!--  <div class="footer">
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
            </div> -->
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
       <script type="text/javascript">
           function deletesanpham(id)
           {
            var link="{{url('/product/delete')}}";
            if(confirm("Bạn có muốn xóa sản phẩm này không?")){
                $.ajax({
                    url:link,
                    data:{
                        'id':id,
                        '_token':'{{csrf_token()}}',
                    },
                    type:"post",
                    error:function(xhr,status,errorThrow){
                        alert(errorThrow);
                    },
                    success:function(data){
                        alert("Xóa thành công");
                       location.reload();
                    }
                })
            }
           }
       </script>
        @stop()