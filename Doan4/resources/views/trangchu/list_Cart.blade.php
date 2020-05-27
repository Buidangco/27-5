<div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">Tên sản phẩm</th>
                                                            <th class="product-price">Giá bán</th>
                                                            <th class="product-quantity">Số lượng</th>
                                                            <th class="product-subtotal">Tổng tiền</th>
                                                            <th class="product-remove">save</th>
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
                                                             <td class="product-remove">
                                                                <a href="#">
                                                                <i onclick="Save_listItemCart('{{$item['productinfo']->id}}')" class="ti-save">Lưu</i>
                                                            </a>
                                                            </td>
                                                            <td class="product-subtotal">{{number_format($item['price'])}}đ</td>
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
                                                                <input type="" id="tongsoluong" value="{{Session::get('Cart')->totalQuanty}}" name="">
                                                                <input style="opacity: 0" type="" id="tonggia" value="{{number_format(Session::get('Cart')->totalPrice)}}đ" name="">
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
