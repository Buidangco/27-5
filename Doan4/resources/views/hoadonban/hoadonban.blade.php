       @extends('layouts.dash')
       @section('section')
  
        <div class="dashboard-wrapper" style="    margin-top: -20px;    margin-bottom: -40px;">
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
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                    <h5 class="card-header" style="display: flex;">
                                    <button type="button" class="btn btn-secondary" onclick="chuaxacnhan()">Đơn hàng chưa xác nhận</button>                                 
                                    <button type="button" class="btn btn-dark" onclick="xacnhan()">Đơn hàng xác nhận</button>
                                    <button type="button" class="btn btn-danger"  onclick="huy()">Đơn hàng hủy</button>
                                    <button type="button" class="btn btn-success" onclick="refresh()">refresh</button></h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped" style="height: 600px">
                                                <thead class="bg-light">
                                                    <tr style="  font-size: 24px;background-color: #2a4d69;">
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;color: aliceblue;">STT</th>
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;color: aliceblue;">Mã khách hàng</th>
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;color: aliceblue;">Tổng tiền</th>
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;color: aliceblue;">Ngày bán</th> 
                                                        <th colspan="2" style="padding: 24px;font-family: initial;font-weight: 800;color: aliceblue;text-align: center;">Xác nhận</th> 
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;text-align: center;color: aliceblue;">View </th>
                                                        <th style="padding: 24px;font-family: initial;font-weight: 800;text-align: center;color: aliceblue;">Sửa </th>
                                                    <!--     <th class="border-0">Xóa</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="duyet">
                                                	@foreach($data1 as $row)
                                                    <tr id="an">
                                                        <td style="color: red;">{{$i++}}</td>
                                                        <td>{{$row->makh}}</td>
                                                        <td>{{$row->gia}}</td>
                                                        <td>{{$row->ngayban}}</td>
                                                        @if($row->xacnhan=='Chưa duyệt')
                                                        <td id="chon"> 
                                                        <button   id="xacnhan" class="btn btn-outline-secondary " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="xacnhanda('{{$row->mahoadon}}')"> {{$row->xacnhan}}</button>
<!--                                                            <div class="dropdown-menu" id="hoanthanh">
                                                             <a id="daduyet-{{$row->mahoadon}}" class="dropdown-item" onclick="xacnhanda('{{$row->mahoadon}}')">Đã duyệt</a>
                                                           </div> -->
                                                    </td>
                                                    @else
                                                     <td id="chon"> 
                                                        <button style="    color: cornsilk;background: darkred;" id="xacnhan"  class="btn btn-outline-secondary " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > {{$row->xacnhan}}</button>
                                                      </td>
                                                    @endif
                                                    <!-- <td style="display: flex;color: red">            
                                                       Xét duyệt <input style="    display: block;margin-right: 12px;margin-left: 7px;" type="radio" name="phai" value="Nam" checked> Chưa duyệt <input  style="    display: block;    margin-left: 7px;" type="radio" name="phai" value="Nữ">  
                                                    </td> -->
                                                    @if($row->trangthai=='Chưa giao hàng')
                                                           <td id="chon"> 
                                                        <button style="    color: cornsilk;background: black;" id="xacnhan"  class="btn btn-outline-secondary " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > {{$row->trangthai}}</button>
                                                      </td>
                                                      @else                                                           <td id="chon"> 
                                                        <button style="    color: cornsilk;    background: chocolate;;" id="xacnhan"  class="btn btn-outline-secondary " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > {{$row->trangthai}}</button>
                                                      </td>

                                                      @endif
                                                        <td style="text-align: center;">
                                                          <a style="background: chocolate;" onclick="view('{{$row->mahoadon}}')" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fa fa-eye"></i></a>    
                                                      </td>
                                                        <td style="text-align: center;">
                                                          <a style="background: chocolate;" href="{{route('/product/edit',$row->mahoadon)}}" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-edit"></i></a>
                                                      </td>
                                 <!--                        <td><a onclick="deletesanpham('{{$row->mahoadon}}')" class="btn btn-default btn-rounded mb-4"><i class="fas fa-trash-alt"></i></a>
                                                        </td> -->
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

       <script>
  
       function view(id)
        {
            document.getElementById('id01').style.display='block';
            document.getElementById('id01').style.opacity='1';
          
          let route='/product/hoadonban/layma/'+id;
          console.log(route);

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
                success:function(data){
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
          function chuaxacnhan(){
            $.ajax({
              type:'GET',
              url:'/product/viewdonhangchuaduyet'
            }).done(function(response){
              $('#duyet').empty();
              $('#duyet').html(response);
            })
          }
          function xacnhan(){
            $.ajax({
              type:'GET',
              url:'/product/xacnhan'
            }).done(function(response){
              $('#duyet').empty();
              $('#duyet').html(response);
            })
          }
          function huy(){
            $.ajax({
              type:'GET',
              url:'/product/huy'
            }).done(function(response){
              $('#duyet').empty();
              $('#duyet').html(response);
            })
          }
          function refresh(){
             $.ajax({
              type:'GET',
              url:'/product/refresh'
            }).done(function(response){
              $('#duyet').empty();
              $('#duyet').html(response);
            })
          }
       </script>
        @stop()