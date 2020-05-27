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
                         <a style="    width: 175px;    padding: 30px;" href="/product/add" class="btn btn-default btn-rounded mb-4"  >Thêm sản phẩm</a>

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
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">STT</th>
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">Hình Ảnh</th>
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">Tên SP</th>
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;color: aliceblue;">Giá</th>      
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;text-align: center;color: aliceblue;">Sửa </th>
                                                        <th style="padding: 23px;font-family: initial;font-weight: 800;text-align: center;color: aliceblue;">Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="themvao">
                                                    
                                                	@foreach($data1 as $row)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="{{url('storage/photos/1')}}/{{$row->image}}" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td style="opacity: 0;display: none;"><input type="text"  id="code" value="{{$row->code}}" name=""></td>
                                                        <td>{{$row->name}}</td> 
                                                        <td><span>{{number_format($row->price)}}&nbsp;₫ </span></td>
                                                        <td style="text-align: center;">
                                                          <a style="background: chocolate;" href="{{route('/product/edit',$row->id)}}" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-edit"></i></a>
                                                      </td>
                                                        <td style="text-align: center;"><a style="background: chocolate;" onclick="deletesanpham('{{$row->id}}','{{$row->code}}')" class="btn btn-default btn-rounded mb-4"><i style="color: aliceblue;" class="fas fa-trash-alt"></i></a>
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
       <script type="text/javascript">
           function deletesanpham(id,code)
           {
            if(confirm("Bạn có muốn xóa sản phẩm này không?")){
                $.ajax({
                    type:'GET',
                    url:'/product1/delete/'+id+'/'+code,
                    // data:{
                    //     'id':id,
                    //     '_token':'{{csrf_token()}}',
                    // },
                    // type:"post",
                    // error:function(xhr,status,errorThrow){
                    //     alert(errorThrow);
                    // },
                    // success:function(data){
                    //     alert("Xóa thành công");
                    //    location.reload();
                    // }
                }).done(function(response){
           $("#themvao").empty();
            $("#themvao").html(response);
                alertify.success('Tìm thành công');
         })
            }
           }

           function timkiemsanpham()
           {
            let nameprice= $('#nameprice').val();
          let code=$("#code").val();
           let code1 =$('#nho').html(code);
           let code2=$('#nho').text();
         $.ajax({
          type:'GET',
          url:'/danhsachtimkiem1/'+nameprice+'/'+code2,
         }).done(function(response){
           $("#themvao").empty();
            $("#themvao").html(response);
                alertify.success('Tìm thành công');
         })
           }
       </script>
        @stop()