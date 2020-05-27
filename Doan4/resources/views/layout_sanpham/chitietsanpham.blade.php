@include('trangchu.slide_chitiet')

<section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        @if(Auth::user()!=null)
                        <input id="Auth" type="" style="opacity: 0" name="" value="{{Auth::user()->id}}">
                        @endif
                        <div class="col-md-9 col-xs-12">
                            @foreach($sanpham_ct as $ct)
                            <!-- single-product-area start -->
                            <div class="single-product-area mb-80">
                                <div class="row">
                                    <!-- imgs-zoom-area start -->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="imgs-zoom-area">
                                            <img id="zoom_03" src="{{url('storage/photos/1')}}/{{$ct->image}}" data-zoom-image="img/product/6.jpg" alt="">
                                        </div>
                                    </div>
                                    <!-- imgs-zoom-area end -->
                                    <!-- single-product-info start -->
                                    <div class="col-md-7 col-sm-7 col-xs-12"> 
                                        <div class="single-product-info">
                                            <h3 class="text-black-1">{{$ct->name}} </h3>
                                            <h6 class="brand-name-2">Khuyến mãi :{{$ct->sale}}%</h6>
                                            <!--  hr -->
                                            <hr>
                                            <!-- single-pro-color-rating -->
                                            <div class="single-pro-color-rating clearfix">
                                                <div class="sin-pro-color f-left">
                                                    <p class="color-title f-left">Color</p>
                                                    <div class="widget-color f-left">
                                                        <ul>
                                                            <li class="color-1"><a href="#"></a></li>
                                                            <li class="color-2"><a href="#"></a></li>
                                                            <li class="color-3"><a href="#"></a></li>
                                                            <li class="color-4"><a href="#"></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="pro-rating sin-pro-rating f-right">
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <span class="text-black-5">( 27 Rating )</span>
                                                </div>
                                            </div>
                                            <!-- hr -->
                                            <hr>
                                            <!-- plus-minus-pro-action -->
                                            <div class="plus-minus-pro-action clearfix">
                                                <div class="sin-plus-minus f-left clearfix">
                                                    <p class="color-title f-left">SL</p>
                                                    <div class="cart-plus-minus f-left">
                                                        <input type="text" id="soluongnay" value="01" name="qtybutton" class="cart-plus-minus-box">
                                                   </div>   
                                                </div>
                                                <div class="sin-pro-action f-right">
                                                    <ul class="action-button">
                                                        <li>
                                                            <a href="#" title="Wishlist" tabindex="0"><i class="zmdi zmdi-favorite"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview" tabindex="0"><i class="zmdi zmdi-zoom-in"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Compare" tabindex="0"><i class="zmdi zmdi-refresh"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Add to cart" tabindex="0"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- plus-minus-pro-action end -->
                                            <!-- hr -->
                                            <hr>
                                            <!-- single-product-price -->
                                            <div class="pro-price" style="display: flex;"> <h4 class="pro-price">Giá : {{number_format(($ct->price)-($ct->price)/($ct->sale))}}đ</h4>
                                                <h4 style="margin-left: 20px; text-decoration: line-through;opacity: 0.7" class="pro-price">{{number_format($ct->price)}}đ</h4>
                                            </div>

                                            
                                            <!--  hr -->
                                            <hr>
                                            <div>
                                                <a class="button extra-small button-black" tabindex="-1">
                                                    <span class="text-uppercase" onclick="them1('{{$ct->id}}')">Buy now</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-info end -->
                                </div>
                                <!-- single-product-tab -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- hr -->
                                        <hr>
                                        <div class="single-product-tab">
                                            <ul class="reviews-tab mb-20">
                                                <li class="active"><a href="#description" data-toggle="tab">Miêu tả</a></li>
                                                <li><a href="#information" data-toggle="tab">Thông tin</a></li>
                                                <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="description">
                                                    <p>{{$ct->introduce}}</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="information">
                                                    <p>{{$ct->thongso}}</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="reviews">
                                                    <!-- reviews-tab-desc -->
                                                    <div class="reviews-tab-desc">
                                                        <!-- single comments -->
                                                        <!-- <div class="media mt-30">
                                                            <div class="media-left">
                                                                <a href="#"><img class="media-object" src="img/author/1.jpg" alt="#"></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="clearfix">
                                                                    <div class="name-commenter pull-left">
                                                                        <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                                                        <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <ul class="reply-delate">
                                                                            <li><a href="#">Reply</a></li>
                                                                            <li>/</li>
                                                                            <li><a href="#">Delate</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas .</p>
                                                            </div>
                                                        </div> -->
                                                        <!-- single comments -->
                                                       <!--  <div class="media mt-30">
                                                            <div class="media-left">
                                                                <a href="#"><img class="media-object" src="img/author/2.jpg" alt="#"></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="clearfix">
                                                                    <div class="name-commenter pull-left">
                                                                        <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                                                        <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <ul class="reply-delate">
                                                                            <li><a href="#">Reply</a></li>
                                                                            <li>/</li>
                                                                            <li><a href="#">Delate</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas .</p>
                                                            </div>
                                                        </div> -->
                                                        <div id="binhluan" >
                                                            @if($binhluan!=null)
                                                            @foreach($binhluan as $rows)
                                                            <div style="display: flex;">
                                                                <img src="{{url('/')}}/victory.png">
                                                                <div style="font-size: 27px;color: black;">{{$rows->name}}</div>
                                                                <div style="margin-left: 40px;color: black;">{{$rows->binhluan}}</div>
                                                            </div> 
                                                            <p style="float: right;position: relative;bottom: 128px;">{{$rows->ngay}}</p>
                                                            
                                                            @endforeach
                                                            @endif
                                                        </div>
                                                        @if(Auth::user()!=null)
                                                        <div class="form-group">
                                                            <label for="comment">Comment:</label>
                                                            <textarea class="form-control" rows="4" id="comment"></textarea>
                                                        </div>
                                                        
                                                        <button onclick="binhluan('{{$ct->id}}')" class="btn btn-danger" >Binh luan</button>
                                                        @else
<!--                                                         <a href="/Home1/login">
 -->                                                        <button onclick="login()" class="btn btn-danger" >Login</button>
<!--                                                         </a>
 -->                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  hr -->
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           

                            <!-- single-product-area end -->
                            <div class="related-product-area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title text-left mb-40">
                                            <h2 class="uppercase">SẢN PHẨM LIÊN QUAN</h2>
                                            <h6>Có rất nhiều biến thể của các thương hiệu có sẵn,</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="active-related-product " style="    height: 500px;overflow-y: overlay;">
                                         <!-- product-item start -->
                                        <div aria-live="polite" class=" draggable" >
                                            <div class="slick-track" role="listbox" style="    width: 900px;
    margin-left: 98%; transform: translate3d(-879px, 0px, 0px);">
                                       
                                        @foreach($sanpham_ct1 as $ct1)
                                       <div class="col-xs-12 "  style="width: 293px;">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="/../Home/chitiet/{{$ct1->id}}" tabindex="-1">
                                                        <img src="{{url('storage/photos/1')}}/{{$ct1->image}}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="single-product.html" tabindex="-1">{{$ct1->name}}</a>
                                                    </h6>
                                                    <div class="pro-rating">
                                                        <a href="#" tabindex="-1"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="-1"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="-1"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#" tabindex="-1"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#" tabindex="-1"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                    <h3 class="pro-price">{{number_format(($ct1->price)-($ct1->price)/($ct1->sale))}}đ</h3>
                                                    <ul class="action-button">
                                                        <li>
                                                            <a href="#" title="Wishlist" tabindex="-1"><i class="zmdi zmdi-favorite"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview" tabindex="-1"><i class="zmdi zmdi-zoom-in"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Compare" tabindex="-1"><i class="zmdi zmdi-refresh"></i></a>
                                                        </li>
                                                        <li>
                                                            <a title="Add to cart" tabindex="-1"><i class="zmdi zmdi-shopping-cart-plus" onclick="them('{{$ct1->id}}')"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-xs-12">
                            <!-- widget-search -->
                            <aside class="widget-search mb-30">
                                <form action="#">
                                    <input type="text" placeholder="Search here...">
                                    <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                </form>
                            </aside>
                            <!-- widget-categories -->
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Categories</h6>
                                <div id="cat-treeview" class="product-cat">
                                    <ul class="treeview">
                                        <li class="closed expandable"><div class="hitarea closed-hitarea expandable-hitarea"></div><a href="#">Brand One</a>
                                            <ul class="treeview" style="display: none;">
                                                <li><a href="#">Mobile</a></li>
                                                <li><a href="#">Tab</a></li>
                                                <li><a href="#">Watch</a></li>
                                                <li><a href="#">Head Phone</a></li>
                                                <li class="last"><a href="#">Memory</a></li>
                                            </ul>
                                        </li>                                       
                                        <li class="open collapsable"><div class="hitarea open-hitarea collapsable-hitarea"></div><a href="#">Brand Two</a>
                                            <ul class="treeview">
                                                <li><a href="#">Mobile</a></li>
                                                <li><a href="#" class="">Tab</a></li>
                                                <li><a href="#">Watch</a></li>
                                                <li><a href="#">Head Phone</a></li>
                                                <li class="last"><a href="#">Memory</a></li>
                                            </ul>
                                        </li>
                                        <li class="closed expandable"><div class="hitarea closed-hitarea expandable-hitarea"></div><a href="#">Accessories</a>
                                            <ul class="treeview" style="display: none;">
                                                <li><a href="#">Footwear</a></li>
                                                <li><a href="#">Sunglasses</a></li>
                                                <li><a href="#">Watches</a></li>
                                                <li class="last"><a href="#">Utilities</a></li>
                                            </ul>
                                        </li>
                                        <li class="closed expandable"><div class="hitarea closed-hitarea expandable-hitarea"></div><a href="#">Top Brands</a>
                                            <ul class="treeview" style="display: none;">
                                                <li><a href="#">Mobile</a></li>
                                                <li><a href="#">Tab</a></li>
                                                <li><a href="#">Watch</a></li>
                                                <li><a href="#">Head Phone</a></li>
                                                <li class="last"><a href="#">Memory</a></li>
                                            </ul>
                                        </li>
                                        <li class="closed expandable lastExpandable"><div class="hitarea closed-hitarea expandable-hitarea lastExpandable-hitarea"></div><a href="#">Jewelry</a>
                                            <ul class="treeview" style="display: none;">
                                                <li><a href="#">Footwear</a></li>
                                                <li><a href="#">Sunglasses</a></li>
                                                <li><a href="#">Watches</a></li>
                                                <li class="last"><a href="#">Utilities</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                            <!-- operating-system -->
                            <div id="login" style="display: none;">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="/Home1/login2" method="post" style="margin-right: 285px;">
                            @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="Password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                          @if(isset($errors))
                     <p style="color: red">
                        @foreach($errors->all() as $error)
                        {!! $error!!}<br/>
                         @endforeach
                     </p>
                     @endif
                    @if(isset($message))
                    <p style="color: red">
                    {{$message}}
                   </p>
                     @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
                            <!-- widget-product -->
                            <aside class="widget widget-product box-shadow">
                                <h6 class="widget-title border-left mb-20">recent products</h6>
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name</a>
                                        </h6>
                                        <h3 class="pro-price">$ 869.00</h3>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/8.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name</a>
                                        </h6>
                                        <h3 class="pro-price">$ 869.00</h3>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/12.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name</a>
                                        </h6>
                                        <h3 class="pro-price">$ 869.00</h3>
                                    </div>
                                </div>
                                <!-- product-item end -->                               
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->         
        </section>

         <script type="text/javascript">
            function binhluan(id){
               let binhluan= document.getElementById("comment").value;
               let idauth= document.getElementById("Auth").value;
               $.ajax({
                type:'GET',
                url:'/Home1/Binhluan/'+id+'/'+binhluan+'/'+idauth,
               }).done(function(response){
                $("#binhluan").empty();
                $("#binhluan").html(response);
               })
            }
            function login()
            {
                $("#login").css('display','block');
            }
        </script>