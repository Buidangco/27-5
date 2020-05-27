@extends('layout_sanpham.layoutchung')
@section('body')
@include('trangchu.header')
<div id="themcode">
@include('trangchu.slide_chitiet')
  <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="#shopping-cart" data-toggle="tab">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="#checkout" data-toggle="tab">
                                        <span>02</span>
                                        Checkout
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- shopping-cart start -->
                                <div class="tab-pane" id="shopping-cart">
                                    <div class="shopping-cart-content">
                                        <form action="#" id="list-cart">
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">Tên sản phẩm</th>
                                                            <th class="product-price">Giá bán</th>
                                                            <th class="product-quantity">Số lượng</th>
                                                            <th class="product-subtotal">Tổng tiền</th>
                                                            <th class="product-remove">Save</th>
                                                            <th class="product-remove">Xóa</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- tr -->
                                                        @if(Session::has("Cart") !=null)
                                                          @foreach(Session::get('Cart')->products as $item)
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="{{url('storage/photos/1')}}/{{$item['productinfo']->image}}" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#">{{$item['productinfo']->name}}</a>
                                                                    </h6>
                                                                    <p>Brand: Brand Name</p>
                                                                    <p>Model: Grand s2</p>
                                                                    <p> Color: Black, White</p>
                                                                </div>
                                                            </td>
                                                            <td class="product-price">{{number_format($item['productinfo']->price)}}đ </td>
                                                            <td class="product-quantity">
                                                                <div class="cart-plus-minus f-left">
                                                                    <input id="id-item-{{$item['productinfo']->id}}" type="text" value="{{$item['quanty']}}" name="qtybutton" class="cart-plus-minus-box">
                                                                </div> 
                                                            </td>
                                                            <td class="product-subtotal">{{number_format($item['price'])}}đ</td>
                                                             <td class="product-remove">
                                                                <a href="#">
                                                                <i onclick="Save_listItemCart('{{$item['productinfo']->id}}')" class="ti-save">Lưu</i>
                                                            </a>
                                                            </td>
                                                            <td class="product-remove">
                                                                <a href="#"><i onclick="deletelistItemCart('{{$item['productinfo']->id}}')" class="zmdi zmdi-close"></i></a>
                                                            </td>
                                                        </tr>
                                                        <!-- tr -->
                                                        @endforeach
                                                        @endif
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="payment-details box-shadow p-30 mb-50">
                                                        <h6 class="widget-title border-left mb-20">Thông tin</h6>
                                                        <table>
                                                               @if(Session::has("Cart") !=null)
                                                            <tr>
                                                                <td class="td-title-1">Số lượng</td>
                                                                <td class="td-title-2">{{Session::get('Cart')->totalQuanty}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Tổng tiền</td>
                                                                <td class="td-title-2">{{number_format(Session::get('Cart')->totalPrice)}}đ</td>
                                                            </tr>
                                                            @endif
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </form>
                                    </div>
                                </div>
                                <!-- shopping-cart end -->
                                <!-- wishlist start -->
                              
                                <!-- wishlist end -->
                                <!-- checkout start -->
                                <div class="tab-pane active" id="checkout">
                                    <div class="checkout-content box-shadow p-30">
                                        <form method="post" action="/Home/Cart/dathang" >
                                            @csrf
                                            <div class="row">
                                                <!-- billing details -->
                                                <div class="col-md-6">
                                                    <div class="billing-details pr-10">
                                                        <h6 class="widget-title border-left mb-20">Thông tin khách hàng</h6>
                                                        <input style="font-size: 22px !important;" required="name" type="text" name="ten"  placeholder="Tên của bạn...">
                                                        <input style="font-size: 22px !important;    height: 45px;" type="email" class="form-control" required="email" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email của bạn...">
                                                        <input style="font-size: 22px !important;margin-top: 20px;" type="text" name="sdt" required="sdt" placeholder="Số điện thoại...">
                                                        <input style="font-size: 22px !important;" required="diachi" type="text" name="diachi" placeholder="Địa chỉ...">
                                                        Giới tính:<br>Nam <input type="radio" name="phai" value="Nam">, Nữ <input type="radio" name="phai" value="Nữ"><br>
                                                        <input style="opacity: 0" type="text" value="{{Auth::guard('admin')->user()->id}}" name="idtk">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- our order -->
                                                    <div class="payment-details pl-10 mb-50">
                                                        <h6 class="widget-title border-left mb-20">Đơn hàng của bạn</h6>
                                                        <table>
                                                              @if(Session::has("Cart") !=null)
                                                            <tr>
                                                                <td class="order-total">Tổng số sản phẩm</td>
                                                                <td class="order-total-price1" style="color: red">{{Session::get('Cart')->totalQuanty}}</td>
                                                            </tr>
                                                           
                                                            <tr>
                                                                <td class="order-total">Tổng số đơn hàng</td>
                                                                <td class="order-total-price">{{number_format(Session::get('Cart')->totalPrice)}}đ</td>
                                                            </tr>
                                                            @endif
                                                        </table>
                                                    </div> 
                                                    <!-- payment-method -->
                                                    <!-- payment-method end -->
                                                    <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">ĐẶT HÀNG</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- checkout end -->
                                <!-- order-complete start -->
                               
                                <!-- order-complete end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
    </div>
        <!-- End page content -->
        <script>
            function deletelistItemCart(id) {
                let route = '{{ route('xoalistsanpham', ['id' => ':id']) }}';
                route = route.replace(':id', id);
                console.log(route);
            $.ajax({
                 type:'GET',
                url:route,
            }).done(function(response){
               RenderCart1(response);
                // $("#total-quanty-show").text($("#total-quanty-cart").val());
                alertify.success('Xóa thành công');
            });
            }

            function Save_listItemCart(id){
                console.log(id);
            $.ajax({
                 type:'GET',
                url:'/save_list_ItemCart/'+id+'/'+$("#id-item-"+id).val(),
            }).done(function(response){
               RenderCart1(response);
                // $("#total-quanty-show").text($("#total-quanty-cart").val());
                alertify.success('Lưu thành công');
            });
            }


             function RenderCart1(response){
             $("#list-cart").empty();
                $("#list-cart").html(response);
                 $(".order-total-price").text($("#tonggia").val());
                 $(".order-total-price1").text($("#tongsoluong").val());
            // console.log($("#total-quanty-cart").val());
        }


        function choncode(code)
        {
            $.ajax({
                type:"GET",
                url:'/choncode/'+code,
            }).done(function(response){
                $('#themcode').empty();
                $('#themcode').html(response);
            })
        }


        </script>
@include('trangchu.footer')
@stop()