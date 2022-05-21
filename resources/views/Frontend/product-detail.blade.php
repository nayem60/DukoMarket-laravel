@extends('Frontend/layouts.base')
@section('main')
    <main>
        <!-- breadcrumb__area-start -->
        <section class="breadcrumb__area box-plr-75">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                </ol>
                              </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb__area-end -->
        <div class="product-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product__details-nav d-sm-flex align-items-start">
                            <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="thumbOne-tab" data-bs-toggle="tab" data-bs-target="#thumbOne" type="button" role="tab" aria-controls="thumbOne" aria-selected="true">
                                     @if(!empty($product->image))
                                      <img src="{{ asset('frontend') }}/assets/img/product/{{ $product->image }}" alt="" style="width:90px;heigth:90px;">
                                      @endif
                                  </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="thumbTwo-tab" data-bs-toggle="tab" data-bs-target="#thumbTwo" type="button" role="tab" aria-controls="thumbTwo" aria-selected="false">
                                    <img src="assets/img/product/nav/product-nav-2.jpg" alt="">
                                  </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="thumbThree-tab" data-bs-toggle="tab" data-bs-target="#thumbThree" type="button" role="tab" aria-controls="thumbThree" aria-selected="false">
                                    <img src="assets/img/product/nav/product-nav-3.jpg" alt="">
                                  </button>
                                </li>
                            </ul>
                            <div class="product__details-thumb">
                                <div class="tab-content" id="productThumbContent">
                                    <div class="tab-pane fade show active" id="thumbOne" role="tabpanel" aria-labelledby="thumbOne-tab">
                                        <div class="product__details-nav-thumb w-img">
                                            <img src="{{ asset('frontend') }}/assets/img/product/{{ $product->image }}" alt="" style="width:350px;heigth:30px;">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="thumbTwo" role="tabpanel" aria-labelledby="thumbTwo-tab">
                                        <div class="product__details-nav-thumb w-img">
                                            <img src="assets/img/product/nav/product-nav-big-3.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="thumbThree" role="tabpanel" aria-labelledby="thumbThree-tab">
                                        <div class="product__details-nav-thumb w-img">
                                            <img src="assets/img/product/nav/product-nav-big-2.jpg" alt="">
                                        </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product__details-content">
                            <h6>{{ $product->name }}</h6>
                            @php 
                              $avgrating=0;
                            @endphp
                            
                            @foreach($product->orderitem->where('rstatus',1) as $orderitem)
                            @php
                                $avgrating+=$orderitem->review->rating;
                            @endphp
                            
                            @endforeach
                            <div class="pd-rating mb-10">
                                <ul class="rating">
                                  @for($i=1;$i <= 5;$i++)
                                 
                                    @if($i <= $avgrating)
                                      <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    @else
                                       <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    @endif
                                    
                                  @endfor
                                </ul>
                                <span>({{ $product->orderitem->where('rstatus',1)->count()}} review)</span>
                                <span><a href="#">Add your review</a></span>
                            </div>
                            <div class="price mb-10">
                                <span>$216.00</span>
                            </div>
                            <div class="features-des mb-20 mt-10">
                                <ul>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i>{{ $product->short_description}}</a></li>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                    <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                </ul>
                            </div><br>
                          @if(!empty($product->variant[0]->size_id))
                            <div class="mb-4">
                            @php
                              $size_array=[];
                               foreach($product->variant as $size){
                                 $size_array[]=$size->size->name;
                               }
                               $size_array=array_unique($size_array);
                            @endphp
                          
                              <label>Size:</label>&nbsp
                            @foreach($product->variant->unique('size_id') as $size)
                              <button type="button" onclick="size({{ $size->size->id }})" class="btn btn-ligth btn-sm border mr-5 rounded choose-size colors_{{ $size->color->id }}" id="size_{{ $size->size->id }}" data-price="{{ $size->price }}">{{ $size->size->name }}</button>
                            @endforeach
                            </div>
                         @endif
                         
                         @if(!empty($product->variant[0]->color_id))
                            <div class="mb-3">
                              <label>Color:</label>&nbsp
                            @foreach($product->variant->unique('color_id') as $color)
                              <button type="button" onclick="color({{ $color->color->id }})" class="btn btn-ligth btn-sm border mr-5 rounded choose-color sizes_{{ $color->size->id }} size_link" id="color_{{ $color->color->id }}" data-price="{{ $color->price }}">{{ $color->color->name }} </button>
                            @endforeach
                           </div>
                        @endif
                            
                            <div class="product-stock mb-20">
                                <h5>Availability: <span> {{ $product->quantity}} in stock</span></h5>
                            </div>
                            <div class="cart-option mb-15">
                                <div class="product-quantity mr-20">
                                    <div class="cart-plus-minus p-relative"><input type="text" id="quantity" value="1"><div class="dec qtybutton qty">-</div><div class="inc qtybutton qty">+</div></div>
                                    <input type="hidden" id="variant_id">
                                </div>
                                @if(!empty($product->variant[0]->id))
                                 <a href="javascript:void(0)" onclick="cartWithVariant({{$product->id}},{{ $product->variant[0]->id}})" class="cart-btn">Add to Cart</a> 
                                @else
                                <a href="javascript:void(0)" onclick="add_cart({{$product->id}})" class="cart-btn">Add to Carts</a>
                                @endif
                            </div>
                            <div class="details-meta">
                                <div class="d-meta-left">
                                    <div class="dm-item mr-20">
                                        <a href="{{ route('add_wishlist',$product->id)}}"><i class="fal fa-heart"></i>Add to wishlist</a>
                                    </div>
                                   
                                </div>
                                <div class="d-meta-left">
                                    <div class="dm-item">
                                        <a href="javascript:void(0)"><i class="fal fa-share-alt"></i>Share</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tag-area mt-15">
                                <div class="product_info">
                                    <span class="sku_wrapper">
                                        <span class="title">SKU:</span>
                                        <span class="sku">DK1002</span>
                                    </span>
                                    <span class="posted_in">
                                        <span class="title">Categories:</span>
                                        <a href="#">iPhone</a>
                                        <a href="#">Tablets</a>
                                    </span>
                                    <span class="tagged_as">
                                        <span class="title">Tags:</span>
                                        <a href="#">Smartphone</a>, 
                                        <a href="#">Tablets</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-details-end -->

        <!-- product-details-des-start -->
        <div class="product-details-des mt-40 mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="product__details-des-tab">
                            <ul class="nav nav-tabs" id="productDesTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="true">Description </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="aditional-tab" data-bs-toggle="tab" data-bs-target="#aditional" type="button" role="tab" aria-controls="aditional" aria-selected="false">Additional information</button>
                                  </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Reviews ({{$product->orderitem->where('rstatus',1)->count()}}) </button>
                                </li>
                              </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="prodductDesTaContent">
                    <div class="tab-pane fade active show" id="des" role="tabpanel" aria-labelledby="des-tab">
                        <div class="product__details-des-wrapper">
                            <p class="des-text mb-35">Designed by Hans J. Wegner in 1949 as one of the first models created especially for Carl Hansen & Son, and produced since 1950. The last of a series of chairs wegner designed based on inspiration from antique Chinese armchairs. The gently rounded top together with the back and seat offers a variety of comfortable seating positions,ideal for both long visits to the dining table and relaxed lounging.</p>
                            <h6 class="des-sm-title">The standard passage, used since the 1500s.</h6>
                            <p class="des-text mb-35">A light chair, easy to move around the dining table and about the room. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <div class="features-des-image text-center">
                                <img src="assets/img/features-product/product-content-1.jpg" alt="">
                            </div>
                            <div class="product-des-section mb-90">
                                <h5 class="des-section mb-30">Get 30% Daily Cash
                                  <br>  Back with Membership Card.</h5>
                                  <p>A new collection of lounge furniture, occasional tables and a stool by Edward Barber & Jay Osgerby offers a relaxed, contemporary attitude toward interior design. The lounge furniture includes four individualized sized sofas, and three complementary ottomans. Available in a range of upholstery fabrics and leathers, the lounge furniture is distinguished by stitched seams that reinforce its architectural profile, softened by the curvature of cushions on each face range of upholstery fabrics and leathers.</p>
                            </div>
                            <div class="row mb-80">
                                <div class="col-xl-6">
                                    <div class="des-single mb-30 text-center">
                                        <div class="features-des-image text-center">
                                            <img src="assets/img/features-product/product-content-2.jpg" alt="">
                                        </div>
                                        <h5 class="des-section">Get 30% Daily Cash
                                            <br>  Back with Membership Card.</h5>
                                        <p>Sit amet conse ctetur adipisicing elit, sed do <br> eiusmod tempor incididunt ut labore et dolore  magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="des-single text-center mb-30">
                                        <div class="features-des-image">
                                            <img src="assets/img/features-product/product-content-3.jpg" alt="">
                                        </div>
                                        <h5 class="des-section text-center">Get 70% Daily Cash
                                            <br>  Back with Membership Card.</h5>
                                        <p>Sit amet conse ctetur adipisicing elit, sed do <br> eiusmod tempor incididunt ut labore et dolore  magna aliqua.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="features-des-image features-des-image-2 text-center mb-50 w-img">
                                <img src="assets/img/features-product/product-content-4.jpg" alt="">
                            </div>
                            <div class="des-sm-features">
                                <div class="des-sm-fet text-center mb-30">
                                    <img src="assets/img/features-product/product-content-5.png" alt="">
                                    <span>Ultra Wide Angle</span>
                                </div>
                                <div class="des-sm-fet text-center mb-30">
                                    <img src="assets/img/features-product/product-content-6.png" alt="">
                                    <span>Live Focus On</span>
                                </div>
                            </div>
                            <p class="des-text mb-35">Designed by Puik in 1949 as one of the first models created especially for Carl Hansen & Son, and produced since 1950. The last of a series of chairs wegner designed based on inspiration from antique Chinese armchairs. The gently rounded top together with the back and seat offers a variety of comfortable seating positions,ideal for both long visits to the dining table and relaxed lounging. A light chair easy to move around the dining table and about the room. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.</p>
                            <h6 class="des-sm-title">Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC.</h6>
                            <p class="des-text mb-25">Sound of Marshall, unplugs the chords, and takes the show on the road. Weighing in under 7 pounds, the Kilburn is a lightweight piece of vintage styled engineering. Setting the bar as one of the loudest speakers in its class, the Kilburn is a compact, stout-hearted hero with a well-balanced audio which boasts a clear midrange and extended highs for a sound that is both articulate and pronounced. The analogue knobs allow you to fine tune the controls to your personal preferences while the guitar-influenced leather strap enables easy and stylish travel.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="aditional" role="tabpanel" aria-labelledby="aditional-tab">
                        <div class="product__desc-info">
                            <ul>
                               <li>
                                  <h6>Weight</h6>
                                  <span>2 lbs</span>
                               </li>
                               <li>
                                  <h6>Dimensions</h6>
                                  <span>12 × 16 × 19 in</span>
                               </li>
                               <li>
                                  <h6>Product</h6>
                                  <span>Purchase this product on rag-bone.com</span>
                               </li>
                               <li>
                                  <h6>Color</h6>
                                  <span>Gray, Black</span>
                               </li>
                               <li>
                                  <h6>Size</h6>
                                  <span>S, M, L, XL</span>
                               </li>
                               <li>
                                  <h6>Model</h6>
                                  <span>Model	</span>
                               </li>
                               <li>
                                  <h6>Shipping</h6>
                                  <span>Standard shipping: $5,95</span>
                               </li>
                               <li>
                                  <h6>Care Info</h6>
                                  <span>Machine Wash up to 40ºC/86ºF Gentle Cycle</span>
                               </li>
                               <li>
                                  <h6>Brand</h6>
                                  <span>Kazen</span>
                               </li>
                            </ul>
                         </div>
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="product__details-review">
                          @php
                            $user_rating=0;
                          @endphp
                          @foreach($product->orderitem->where('rstatus',1) as $orderitem)
                           @php
                                $user_rating+=$orderitem->review->rating;
                            @endphp
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="review-des-infod">
                                        
                                        <div class="review-details-des">
                                            <div class="author-image mr-15">
                                                <a href="#"><img src="{{asset('frontend')}}/assets/img/author/author-sm-1.jpg" alt=""></a>
                                            </div>
                                            <div class="review-details-content">
                                                <div class="str-info">
                                                    <div class="review-star mr-15">
                                                      @for($i=1;$i<=5;$i++)
                                                        @if($i<=$user_rating)
                                                          <a href="#"><i class="fas fa-star"></i></a>
                                                        @else
                                                           <a href="#"><i class="fal fa-star"></i></a>
                                                        @endif
                                                      @endfor

                                                    </div>
                                                    <div class="add-review-option">
                                                      
                                                    </div>
                                                </div>
                                                <div class="name-date mb-30">
                                                    <h6> {{ $orderitem->order->user->name }} – <span> {{ Carbon\Carbon::parse($orderitem->review->created_at)->format('M d ,Y') }}</span></h6>
                                                </div>
                                                <p>{{ $orderitem->review->comment}}</p>
                                                <div class="input-group">
                                                  &nbsp &nbsp<input type="text" class="form-control form-control-sm round" pleaseholder="reply...">
                                                  <button class="btn btn-warning btn-sm">Submit</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                          @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-details-des-end -->
        <!-- shop modal start -->
        <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered product__modal" role="document">
                <div class="modal-content">
                    <div class="product__modal-wrapper p-relative">
                        <div class="product__modal-close p-absolute">
                            <button data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                        </div>
                        <div class="product__modal-inner">
                            <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product__modal-box">
                                    <div class="tab-content" id="modalTabContent">
                                        <div class="tab-pane fade show active" id="nav1" role="tabpanel" aria-labelledby="nav1-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav2" role="tabpanel" aria-labelledby="nav2-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-2.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav3" role="tabpanel" aria-labelledby="nav3-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-3.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav4" role="tabpanel" aria-labelledby="nav4-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="assets/img/quick-view/quick-view-4.jpg" alt="">
                                            </div>
                                        </div>
                                        </div>
                                    <ul class="nav nav-tabs" id="modalTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="nav1-tab" data-bs-toggle="tab" data-bs-target="#nav1" type="button" role="tab" aria-controls="nav1" aria-selected="true">
                                                <img src="assets/img/quick-view/quick-nav-1.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav2-tab" data-bs-toggle="tab" data-bs-target="#nav2" type="button" role="tab" aria-controls="nav2" aria-selected="false">
                                            <img src="assets/img/quick-view/quick-nav-2.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav3-tab" data-bs-toggle="tab" data-bs-target="#nav3" type="button" role="tab" aria-controls="nav3" aria-selected="false">
                                            <img src="assets/img/quick-view/quick-nav-3.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav4-tab" data-bs-toggle="tab" data-bs-target="#nav4" type="button" role="tab" aria-controls="nav4" aria-selected="false">
                                            <img src="assets/img/quick-view/quick-nav-4.jpg" alt="">
                                            </button>
                                        </li>
                                        </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product__modal-content">
                                    <h4><a href="product-details.html">Samsung C49J89: £875, Debenhams Plus</a></h4>
                                    <div class="product__review d-sm-flex">
                                        <div class="rating rating__shop mb-10 mr-30">
                                        <ul>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        </ul>
                                        </div>
                                        <div class="product__add-review mb-15">
                                        <span>01 review</span>
                                        </div>
                                    </div>
                                    <div class="product__price">
                                        <span>$109.00 – $307.00</span>
                                    </div>
                                    <div class="product__modal-des mt-20 mb-15">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Memory, Storage & SIM: 12GB RAM, 256GB.</a></li>
                                            <li><a href="#"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                        </ul>
                                    </div>
                                    <div class="product__stock mb-20">
                                        <span class="mr-10">Availability :</span>
                                        <span>1795 in stock</span>
                                    </div>
                                    <div class="product__modal-form">
                                        <form action="#">
                                        <div class="pro-quan-area d-lg-flex align-items-center">
                                            <div class="product-quantity mr-20 mb-25">
                                                <div class="cart-plus-minus p-relative"><input type="text" value="1" /></div>
                                            </div>
                                            <div class="pro-cart-btn mb-25">
                                                <button class="cart-btn" type="submit">Add to cart</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="product__stock mb-30">
                                        <ul>
                                            <li><a href="#">
                                                <span class="sku mr-10">SKU:</span>
                                                <span>Samsung C49J89: £875, Debenhams Plus</span></a>
                                            </li>
                                            <li><a href="#">
                                                <span class="cat mr-10">Categories:</span>
                                                <span>iPhone, Tablets</span></a>
                                            </li>
                                            <li><a href="#">
                                                <span class="tag mr-10">Tags:</span>
                                                <span>Smartphone, Tablets</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop modal end -->
    </main>


@endsection