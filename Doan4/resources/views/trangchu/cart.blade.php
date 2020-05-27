@if(Session::has("Cart") !=null)
  @foreach(Session::get('Cart')->products as $item)
                                                <li>
                                                    <div class="total-cart-pro">
                                                        <!-- single-cart -->
                                                        <div class="single-cart clearfix">
                                                            <div class="cart-img f-left">
                                                                <a href="#">
                                                                    <img style="width: 80px;height: 100px" src="{{url('storage/photos/1')}}/{{$item['productinfo']->image}}" alt="Cart Product" />
                                                                </a>
                                                                <div class="del-icon">
                                                                    
                                                                        <i class="zmdi zmdi-close" data-id="{{$item['productinfo']->id}}"></i>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="cart-info f-left">
                                                                <h6 class="text-capitalize">
                                                                    <a href="#">{{$item['productinfo']->name}}</a>
                                                                </h6>
                                                                <p>{{number_format($item['productinfo']->price)}}đ x {{$item['quanty']}}
                                                                </p>
                                                                <p>
                                                                    <span>Model <strong>:</strong></span> x {{$item['quanty']}}
                                                                </p>
                                                                <p>
                                                                    <span>Color <strong>:</strong></span>Black, White
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- single-cart -->
                                                    </div>
                                                </li>
@endforeach
                                                <li>
                                                    <div class="top-cart-inner subtotal">
                                                        <h4 class="text-uppercase g-font-2">
                                                            Total  =  
                                                            <span>{{number_format(Session::get('Cart')->totalPrice)}}đ</span>
                                                            <input style="opacity: 0" id="total-quanty-cart" type="number" value="{{Session::get('Cart')->totalQuanty}}" name="">
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="top-cart-inner view-cart">
                                                        <h4 class="text-uppercase">
                                                            <a href="/Home/Cart/List_cart">View cart</a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="top-cart-inner check-out">
                                                        <h4 class="text-uppercase">
                                                            <a href="#">Check out</a>
                                                        </h4>
                                                    </div>
                                                </li>

                                @endif