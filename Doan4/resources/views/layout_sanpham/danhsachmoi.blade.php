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
                                      <!-- <li class="active"><a href="{{url('Home')}}/{{$list->code}}">{{$list->nameLoai}} </a></li> -->
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
                                            <div class="product-img">
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
                                                    <li>
                                                        <a onclick="them('{{$list_ds->id}}')"  title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
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
                        </div>
                    </div>
                    {{$list_product->links()}}
                </div>
