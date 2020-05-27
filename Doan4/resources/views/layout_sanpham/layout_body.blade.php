 @extends('layout_sanpham.layoutchung')
@section('body')
 <div class="wrapper">

        <!-- START HEADER AREA -->
         @include('trangchu.header')
         <div id="themcode">
        <!-- END HEADER AREA -->
        <!-- START MOBILE MENU AREA -->
        <div class="mobile-menu-area hidden-lg hidden-md">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li>
                                        <a href="shop.html">Products</a>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul>
                                            <li>
                                                <a href="shop.html">Shop</a>
                                            <li>
                                                <a href="single-product.html">Single Product</a>
                                            </li>
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
                                    </li>
                                    <li><a href="blog.html">Blog</a>
                                        <ul>
                                            <li>
                                                <a href="blog.html">Blog</a>
                                            </li>
                                            <li>
                                                <a href="single-blog.html">Blog Details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="about.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MOBILE MENU AREA -->

        <!-- START SLIDER AREA -->
       
        <!-- END SLIDER AREA -->
   @include('trangchu.slide')
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- BY BRAND SECTION START-->
            <div class="by-brand-section mb-80">
                <div class="container">
                    
                    <div class="by-brand-product">
                        <div class="row active-by-brand slick-arrow-2">
                            <!-- single-brand-product start -->
                            <div class="col-xs-12">
                                <div class="single-brand-product">
                                    <a href="single-product.html"><img src="img/product/5.jpg" alt=""></a>
                                    <h3 class="brand-title text-gray">
                                        <a href="#">Brand name</a>
                                    </h3>
                                </div>
                            </div>
                            <!-- single-brand-product end -->
                            <!-- single-brand-product start -->
                            <div class="col-xs-12">
                                <div class="single-brand-product">
                                    <a href="single-product.html"><img src="img/product/6.jpg" alt=""></a>
                                    <h3 class="brand-title text-gray">
                                        <a href="#">Brand name</a>
                                    </h3>
                                </div>
                            </div>
                            <!-- single-brand-product end -->
                            <!-- single-brand-product start -->
                            <div class="col-xs-12">
                                <div class="single-brand-product">
                                    <a href="single-product.html"><img src="img/product/7.jpg" alt=""></a>
                                    <h3 class="brand-title text-gray">
                                        <a href="#">Brand name</a>
                                    </h3>
                                </div>
                            </div>
                            <!-- single-brand-product end -->
                            <!-- single-brand-product start -->
                            <div class="col-xs-12">
                                <div class="single-brand-product">
                                    <a href="single-product.html"><img src="img/product/8.jpg" alt=""></a>
                                    <h3 class="brand-title text-gray">
                                        <a href="#">Brand name</a>
                                    </h3>
                                </div>
                            </div>
                            <!-- single-brand-product end -->
                            <!-- single-brand-product start -->
                            <div class="col-xs-12">
                                <div class="single-brand-product">
                                    <a href="single-product.html"><img src="img/product/8.jpg" alt=""></a>
                                    <h3 class="brand-title text-gray">
                                        <a href="#">Brand name</a>

                                    </h3>
                                </div>
                            </div>
                            <!-- single-brand-product end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- BY BRAND SECTION END -->

            <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section mb-50" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">SẢN PHẨM GIẢM GIÁ TRONG NGÀY</h2>
                                <h6>There are many variations of passages of brands available,</h6>
                            </div>
                        </div>
                    </div>
                         @if($data1==null)
                            <h1 style="text-align: center;color: brown;font-style: oblique;font-family: auto;background: azure;">Hôm nay không có sản phẩm khuyến mãi
                            </h1>
                            @else
                    <div class="featured-product">
                        <div class="row active-featured-product slick-arrow-2">
                            <!-- product-item start -->
                       
                             @foreach($data1 as $row)
                            <div class="col-xs-12" >
                                <div class="product-item">
                                    <div class="product-img">
                                        <span class="sale">{{$row->sale}}%</span>
                                        <a href="chitiet/{{$row->id}}">
                                            <img id="image" src="{{url('storage/photos/1')}}/{{$row->image}}" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        
                                        <h6 class="product-title">
                                            <a id="name" href="single-product.html">{{$row->name}}</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <!-- <div style="display: flex;"> -->
                                            <div style="display: flex;">
                                        <h3 style="margin-left: 15px;font-size: 20px" id="price" class="pro-price">{{number_format($row->price)}}đ</h3>
                                        <h4 style="margin-left: 20px; text-decoration: line-through;opacity: 0.7;font-size: 15px" class="pro-price">{{number_format(($row->price)+($row->price)/($row->sale))}}đ</h4>
                                        <!-- <h3 style="margin-left: 10px" id="price" class="pro-price">{{number_format(($row->price)-($row->price)/($row->sale))}}đ</h3> -->
                                        <!-- </div> -->
                                        </div>
                                        <ul class="action-button">
                                            <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i onclick="showanh()" class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li>
                                            <li>
                                                <a title="Add to cart"><i onclick="them('{{$row->id}}')" class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            <!-- product-item end -->
                            <!-- product-item start -->

                            <!-- product-item end -->
                        </div>
                    </div>  
                     @endif        
                </div>            
            </div>
            <div class="row" style="background-image: url('{{url('/hinh-nen-tuong-Zilean-trong-lien-minh-huyen-thoai-10.jpg')}}');width: 100%;">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase" style="text-align: center;color: azure;
    font-size: 85px;
    font-family: cursive;
    margin-top: 38px">Thời gian </h2>
                                <body>
  <div class="countdown" id="js-countdown" style="    margin-top: 141px;">
    <div class="countdown__item countdown__item--large">
      <div class="countdown__timer js-countdown-days" aria-labelledby="day-countdown" style="color: black;">
        
      </div>
      
      <div class="countdown__label" id="day-countdown" style="text-align: center;">Days</div>
    </div>
    
    <div class="countdown__item">
      <div class="countdown__timer js-countdown-hours" aria-labelledby="hour-countdown" style="color: black;">
        
      </div>
      
      <div class="countdown__label" id="hour-countdown">Hours</div>
    </div>
    
    <div class="countdown__item">
      <div class="countdown__timer js-countdown-minutes" aria-labelledby="minute-countdown" style="color: black;">
        
      </div>
      
      <div class="countdown__label" id="minute-countdown">Minutes</div>
    </div>
    
    <div class="countdown__item">
      <div class="countdown__timer js-countdown-seconds" aria-labelledby="second-countdown" style="color: black;">
        
      </div>
      
      <div class="countdown__label" id="second-countdown">Seconds</div>
    </div>
  </div>
</body>


                            </div>
                        </div>
                    </div>
            <!-- FEATURED PRODUCT SECTION END -->

            <!-- UP COMMING PRODUCT SECTION START -->
         
            <!-- UP COMMING PRODUCT SECTION END -->

            <!-- PRODUCT TAB SECTION START -->
            <div class="product-tab-section mb-50" id="chonloai">
                <div class="container" style="    margin-top: 50px;">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">DANH SÁCH SẢN PHẨM</h2>
                                <h6>There are many variations of passages of brands available,</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="pro-tab-menu text-right">
                                <!-- Nav tabs -->
                                <ul class="" > 
                                    @foreach($loaisp as $list)
                                       <li style="cursor:pointer;" onclick="chonmaloai('{{$list->code}}')" class="active">
                                        <a >
                                            {{$list->nameLoai}} 
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>                       
                        </div>
                    </div>
                    <div class="product-tab">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- popular-product start -->
                            <div class="tab-pane active" id="popular-product">
                                <div class="row">
                                    <!-- product-item start -->
                                    @foreach($list_product as $list_ds)
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="product-item">
                                            <div class="product-img" >
                                                <a href="chitiet/{{$list_ds->id}}">
                                                     @if($list_ds->soluong>0)
                                                    <p class="text" style="color: #fff;position: absolute;top:-10px;background: red;    margin-top: 90%;border-radius: 7%;    width: 47%;text-align: center;padding: 8px;">Còn hàng</p>
                                                    @else
                                                    <p class="text" style="color: #fff;position: absolute;top:-10px;background: red;    margin-top: 90%;border-radius: 7%;    width: 47%;text-align: center;padding: 8px;">Hết hàng</p>
                                                     @endif
                                                    <img src="{{url('storage/photos/1')}}/{{$list_ds->image}}" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                    <a href="single-product.html">{{$list_ds->name}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </div>                                              
                                                <h3 class="pro-price">{{number_format(($list_ds->price)-($list_ds->price)/($list_ds->sale))}}đ</h3>
                                                <ul class="action-button">
                                                    <li>
                                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                    </li>
                                                    <input style="display: none;opacity: 0" id="laysoluong" type="" value="{{$list_ds->soluong}}" name="">
                                                    @if($list_ds->soluong>0)
                                                    <li id="an">
                                                        <a onclick="them('{{$list_ds->id}}')"  title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                    @else

                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- product-item end -->
                                    <!-- product-item start -->
                      
                                    <!-- product-item end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    {{$list_product->links()}}
                </div>
            </div>

            <!-- PRODUCT TAB SECTION END -->

            <!-- BLOG SECTION START -->
            <div class="blog-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Latest blog</h2>
                                <h6>There are many variations of passages of brands available,</h6>
                            </div>
                        </div>
                    </div>
                    <div class="blog">
                        <div class="row active-blog">
                            <!-- blog-item start -->
                            <div class="col-xs-12">
                                <div class="blog-item">
                                    <img src="{{url('image')}}/image1.jpg" alt="">
                                    <div class="blog-desc">
                                        <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                        <p>There are many variations of passages of psum available, but the majority have suffered alterat on in some form, by injected humour, randomis words which don't look even slightly.</p>
                                        <div class="read-more">
                                            <a href="single-blog.html">Read more</a>
                                        </div>
                                        <ul class="blog-meta">
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- blog-item end -->
                            <!-- blog-item start -->
                            <div class="col-xs-12">
                                <div class="blog-item">
                                    <img src="{{url('image')}}/image2.jpg" alt="">
                                    <div class="blog-desc">
                                        <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                        <p>There are many variations of passages of psum available, but the majority have suffered alterat on in some form, by injected humour, randomis words which don't look even slightly.</p>
                                        <div class="read-more">
                                            <a href="single-blog.html">Read more</a>
                                        </div>
                                        <ul class="blog-meta">
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- blog-item end -->
                            <!-- blog-item start -->
                            <div class="col-xs-12">
                                <div class="blog-item">
                                    <img src="{{url('image')}}/image.jpg" alt="">
                                    <div class="blog-desc">
                                        <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                        <p>There are many variations of passages of psum available, but the majority have suffered alterat on in some form, by injected humour, randomis words which don't look even slightly.</p>
                                        <div class="read-more">
                                            <a href="single-blog.html">Read more</a>
                                        </div>
                                        <ul class="blog-meta">
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- blog-item end -->
                            <!-- blog-item start -->
                            <div class="col-xs-12">
                                <div class="blog-item">
                                    <img src="{{url('image')}}/image1.jpg" alt="">
                                    <div class="blog-desc">
                                        <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                        <p>There are many variations of passages of psum available, but the majority have suffered alterat on in some form, by injected humour, randomis words which don't look even slightly.</p>
                                        <div class="read-more">
                                            <a href="single-blog.html">Read more</a>
                                        </div>
                                        <ul class="blog-meta">
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- blog-item end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- BLOG SECTION END -->                
        </section>
        <!-- End page content -->

        <!-- START FOOTER AREA -->
      @include('trangchu.footer')
        <!-- END FOOTER AREA -->

        <!-- START QUICKVIEW PRODUCT -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product clearfix">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img id="image1" alt="" src="img/product/quickview.jpg">
                                    </div>
                                </div>
                                
                                <div class="product-info">
                                    <h1 id="name1"></h1>
                                    <div class="price-box-3">
                                        <div class="s-price-box">
                                            <span id="price1" class="new-price">£160.00</span>
                                            <span  class="old-price">£190.00</span>
                                        </div>
                                    </div>
                                    <a href="single-product-left-sidebar.html" class="see-all">See all features</a>
                                    <div class="quick-add-to-cart">
                                        <form method="post" class="cart">
                                            <div class="numbers-row">
                                                <input type="number" id="french-hens" value="3">
                                            </div>
                                            <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="quick-desc">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                                    </div>
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title-modal">Share this product</h3>
                                            <ul class="social-icons clearfix">
                                                <li>
                                                    <a class="facebook" href="#" target="_blank" title="Facebook">
                                                        <i class="zmdi zmdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="google-plus" href="#" target="_blank" title="Google +">
                                                        <i class="zmdi zmdi-google-plus"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="twitter" href="#" target="_blank" title="Twitter">
                                                        <i class="zmdi zmdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="pinterest" href="#" target="_blank" title="Pinterest">
                                                        <i class="zmdi zmdi-pinterest"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="rss" href="#" target="_blank" title="RSS">
                                                        <i class="zmdi zmdi-rss"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .product-info -->
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div>
            <!-- END Modal -->
        </div>
        <!-- END QUICKVIEW PRODUCT -->
        </div>
    </div>
    <script type="text/javascript">
        // function chonmaloai(code)
        // {
        //      var link="{{url('/Home/home/loai')}}";
        //     $.ajax({
        //         type:"post",
        //         url:link,
        //         data:{
        //             'code':code,
        //              '_token':'{{csrf_token()}}',
        //         },
        //         success:function(data){
        //          location.reload();
        //         }
        //     })
        // }
        function chonmaloai(id)
        {

            $.ajax({
               type:"GET",
               url:'/chonloai4/'+id,
            }).done(function(response){
                $('#chonloai').empty();
                $('#chonloai').html(response);
            })
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

       function chonmachitiet(id)
        {
            $.ajax({
                type:"GET",
                url:'/chonmachitiet/'+id,
            }).done(function(response){
                $('#themcode').empty();
                $('#themcode').html(response);
            })
        }

        function showanh(){
            var image = document.getElementById("image").innerHTML;
            var name = document.getElementById("name").innerHTML;
            var price = document.getElementById("price").innerHTML;

            alert(image);
             document.getElementById("image1").innerHTML=image;
             document.getElementById("name1").innerHTML=name;
             document.getElementById("price1").innerHTML=price;
        }

    </script>
    @stop