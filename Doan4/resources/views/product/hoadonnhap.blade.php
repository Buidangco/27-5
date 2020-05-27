       @extends('layouts.dash')
       @section('section')
  
        <div class="dashboard-wrapper">
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

                            <div id="id01" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="margin-top: 80%;margin-left: 112%;opacity: 0.9;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sản phẩm</h5>
                                    <button type="button" class="close" data1-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true" onclick="tatmodal()">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <table class="table table-bordered">
                                         <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Họ Tên</th>
                                                <th>Giới tính</th>
                                                <th>Email</th>
                                                <th>Địa chỉ</th>
                                            </tr>
                                        </thead>
                                      <tr class="active">
                                       
                                      </tr>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div style="margin-top: -90px;
    margin-left: 2px;" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Recent Orders</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped" style="height: 600px">
                                                <thead class="bg-light">
                                                    <tr style="  font-size: 24px;">
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;">STT</th>
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;">Mã hóa đơn</th>
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;">Tổng số lượng</th>
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;">Ngày nhập</th> 
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;text-align: center;">View </th>
                                                    <!--     <th class="border-0">Xóa</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="duyet">
                                                	@foreach($data1 as $row)
                                                    <tr id="an" style="    height: 67px;">
                                                        <td>{{$i++}}</td>
                                                        <td>{{$row->idhd}}</td>
                                                        <td>{{$row->tongsoluong}}</td>
                                                        <td>{{$row->ngaynhap}}</td>
                                                                    

                                                    <!-- <td style="display: flex;color: red">            
                                                       Xét duyệt <input style="    display: block;margin-right: 12px;margin-left: 7px;" type="radio" name="phai" value="Nam" checked> Chưa duyệt <input  style="    display: block;    margin-left: 7px;" type="radio" name="phai" value="Nữ">  
                                                    
                                                    </td> -->
                                                        <td style="text-align: center;">
                                                          <a style="background: chocolate;" onclick="view('{{$row->idhd}}')" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fa fa-eye"></i></a>   

                                                      </td>
                                                    </tr>
                                                 
                                                    @endforeach
                                                       <tr id="hoadon">
                                                     
                                                    </tr>
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

       <script>
       function view(id)
        {
             document.getElementById('id01').style.display='block';
            document.getElementById('id01').style.opacity='1';
          
          let route='/product/chitiet/layma/'+id;

               $.ajax({
                 type:'GET',
                url:route,
            }).done(function(response){
               $("#id01").empty();
                $("#id01").html(response);
                alertify.success('show thành công');
            });
        }
       
        function xacnhanda(id)
        {
            // document.getElementById('an').style.opacity='0';
            // document.getElementById('an').style.display='none';
           // var xetduyet= $("#xacnhan").text($("#daduyet-"+id).text());
           //  document.getElementById('hoanthanh').style.opacity='0';
           let route='/product/hoadonban/duyet/'+id;

          console.log(route);
           if(confirm("Bạn có muốn xác nhận duyệt hóa đơn?")){
               $.ajax({
                 type:'GET',
                url:route,
                success:function(data1){
                       location.reload();
                    }
            })
            }
        }
        function tatmodal()
        {
            document.getElementById('id01').style.display='none';
            document.getElementById('id01').style.opacity='0';

        }
           function deletesanpham(id)
           {
            var link="{{url('/product/delete')}}";
            if(confirm("Bạn có muốn xóa sản phẩm này không?")){
                $.ajax({
                    url:link,
                    data1:{
                        'id':id,
                        '_token':'{{csrf_token()}}',
                    },
                    type:"post",
                    error:function(xhr,status,errorThrow){
                        alert(errorThrow);
                    },
                    success:function(data1){
                        alert("Xóa thành công");
                       location.reload();
                    }
                })
            }
           }
       </script>
        @stop()