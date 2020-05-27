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
                    <div class="ecommerce-widget" style="margin-top: -109px;">

                        <div class="text-center">
                         <button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">Thêm nhà cung cấp</button>

                        </div>
                        <div class="text-center" style="display: flex;"><input style="    width: 42%;
    margin-left: 1%;height: 58px;" class="form-control" type="text" placeholder="Search" aria-label="Search" id="nameprice">
<!-- <input id="nameprice" type="text" placeholder="Search here...">
 -->                                    <button style="    width: 5%;" onclick="timkiemsanpham()"><i style="font-size: 28px;" class="fa fa-search"></i></button>
                              </div>
                                    <div style="opacity:0;" id="nho"></div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div style="
    margin-left: 10px;" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped" style="height: 600px">
                                                <thead class="bg-light">
                                                    <tr style="    font-size: 24px;background-color: #2a4d69;">
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">STT</th>                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">Tên nhà cung cấp</th> 
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">Số điện thoại</th>
     
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;text-align: center;color: aliceblue;">Sửa </th>
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;text-align: center;color: aliceblue;">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="themvao">
                                                    
                                                	@foreach($data1 as $row)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$row->Ten}}</td> 
                                                        <td><span>{{$row->Sdt}} </span></td>
                                                        <td style="text-align: center;">
                                                          <a style="background: chocolate;" href="{{route('/product/edit',$row->id)}}" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-edit"></i></a>
                                                      </td>
                                                        <td style="text-align: center;"><a style="background: chocolate;" onclick="deletencc('{{$row->id}}')" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-trash-alt"></i></a>
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
            <!-- <div class="footer">
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

<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Nhà cung cấp</h1>
            </div>
            <div class="modal-body">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Mã ncc</label>
                        <div>
                            <input type="text" required class="form-control input-lg" id="ncc" name="mancc" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tên nhà cung cấp </label>
                        <div>
                            <input type="text"  required="Tên" class="form-control input-lg" id="ten" name="ten" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Số điện thoại</label>
                        <div>
                            <input type="text"  required="Số điện thoai" class="form-control input-lg" id="sdt" name="sdt">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button onclick="themncc()" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
       <script type="text/javascript">
           function deletencc(id)
           {
            if(confirm("Bạn có muốn xóa sản phẩm này không?")){
                $.ajax({
                    type:"GET",
                    url:'/product1/deletencc/'+id,
                }).done(function(response){
           $("#themvao").empty();
            $("#themvao").html(response);
                alertify.success('Tìm thành công');
         })
            }
           }

           function themncc()
           {
            let mancc=$("#ncc").val();
            let ten=$("#ten").val();
            let sdt=$("#sdt").val();
         $.ajax({
          type:'GET',
          url:'/product/nhacungcap/'+mancc+'/'+ten+'/'+sdt,
         }).done(function(response){
           $("#themvao").empty();
            $("#themvao").html(response);
                alertify.success('Tìm thành công');
         })
           }
       </script>
        @stop()