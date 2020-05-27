
 <header class="header-area header-wrapper">
            <!-- header-top-bar -->
            <div class="header-top-bar plr-185">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="call-us">
                                <p class="mb-0 roboto">(+88) 01234-567890</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="top-link clearfix">
                                <ul class="link f-right">
                                    @if(Auth::guard('admin')->check())
                                    <li id="li1">
                                        <a href="my-account.html">
                                            <i class="zmdi zmdi-account"></i>
                                        {{Auth::guard('admin')->user()->name}}                            
                                         </a>
                                            <ul id="ul1" class="link f-right">
                                            <li >Tài khoản của tôi</li>
                                            
                                            <li ><a href="/Home2/donhang/{{Auth::guard('admin')->user()->id}}">Đơn hàng</a></li>
                                            
                                        </ul> 
                                        
                                    </li>

                                     <li>
                                        <a href="{{route('logout')}}">
                                            <i class="zmdi zmdi-favorite"></i>
                                            Đăng xuất
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="/Home1/login">
                                            <i class="zmdi zmdi-favorite"></i>
                                            Login
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/Home1/createlogin">
                                            <i class="zmdi zmdi-lock"></i>
                                            Đăng kí
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-middle-area -->
            <div id="sticky-header" class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="{{url('image')}}/logo1.png" style=" width: 54px;" alt="main logo">
                                    </a>
                                </div>
                            </div>
                            <!-- primary-menu -->
                            <div class="col-md-8 hidden-sm hidden-xs">
                                <nav id="primary-menu">
                                    <ul class="main-menu text-center">
                                        <li><a href="/Home/home">Home</a></li>
                                        <li class="mega-parent"><a href="shop.html">Sản phẩm</a>
                                            <div class="mega-menu-area clearfix">
                                                <div class="mega-menu-link f-left">
                                                    @foreach($loaisp as $loai)
                                                    <ul class="single-mega-item">
                                                        <li style="cursor: pointer;" class="menu-title" onclick="choncode('{{$loai->code}}')">
                                                          <!--   <a href="{{url('Home/chitietloai')}}/{{$loai->code}}"> -->
                                                            {{$loai->nameLoai}}
                                                            <!-- </a> -->
                                                        </li>
                                                    </ul>
                                                    @endforeach
                                                </div>
                                                <div class="mega-menu-photo f-left">
                                                    <a href="#">
                                                        <img src="{{url('image')}}/anhnen.jpg" alt="mega menu image">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mega-parent"><a href="#">Pages</a>
                                            <div class="mega-menu-area mega-menu-area-2 clearfix">
                                                <div class="mega-menu-link mega-menu-link-2  f-left">
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title">page list</li>
                                                        <li>
                                                            <a href="shop.html">Shop</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product.html">Single Product</a>
                                                        </li>
                                                    </ul>
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title">page list</li>
                                                        <li>
                                                            <a href="cart.html">Shopping Cart</a>
                                                        </li>
                                                        <li>
                                                            <a href="wishlist.html">Wishlist</a>
                                                        </li>
                                                        <li>
                                                            <a href="checkout.html">Checkout</a>
                                                        </li>
                                                        <li>
                                                            <a href="order.html">Order</a>
                                                        </li>
                                                        <li>
                                                            <a href="login.html">Login</a>
                                                        </li>
                                                        <li>
                                                            <a href="My-account.html">My Account</a>
                                                        </li>
                                                        <li>
                                                            <a href="about.html">About us</a>
                                                        </li>
                                                        <li>
                                                            <a href="404.html">404</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="blog.html">Blog</a>
                                            <ul class="dropdwn">
                                                <li><a href="blog-left-sidebar.html">Dropdown Repeat</a>
                                                    <ul class="dropdwn-repeat">
                                                        <li>
                                                            <a href="blog.html">Blog</a>
                                                        </li>
                                                        <li>
                                                            <a href="s">Blog Details</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="blog.html">Blog</a>
                                                </li>
                                                <li>
                                                    <a href="single-blog.html">Blog Details</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="about.html">About us</a>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- header-search & total-cart -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="search-top-cart  f-right">
                                    <!-- header-search -->
                                    <div class="header-search f-left">
                                        <div class="header-search-inner">
                                           <button class="search-toggle">
                                            <i class="zmdi zmdi-search"></i>
                                           </button>
                                            <form action="#">
                                                <div class="top-search-box">
                                                    <input type="text" placeholder="Search here your product...">
                                                    <button type="submit">
                                                        <i class="zmdi zmdi-search"></i>
                                                    </button>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                    <!-- total-cart -->
                                    <div class="total-cart f-left">
                                        <div class="total-cart-in">
                                            <div class="cart-toggler">
                                                <a href="#">
                                                    @if(Session::has("Cart") !=null)
                                                    <span id="total-quanty-show" class="cart-quantity">{{Session::get("Cart")->totalQuanty}}</span>
                                                    @else
                                                    <span id="total-quanty-show" class="cart-quantity">
                                                    0</span>
                                                    @endif
                                                    <br>
                                                    <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                                </a>                            
                                            </div>
                                            <ul id="them1">
                                                <li>
                                                    <div class="top-cart-inner your-cart">
                                                        <h5 class="text-capitalize">Your Cart</h5>
                                                    </div>
                                                </li>

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
                                                                <p>{{number_format($item['productinfo']->price)}} x {{$item['quanty']}}
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
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>