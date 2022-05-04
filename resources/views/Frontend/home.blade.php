@extends('Frontend/layouts.base')
@section('main')
    <main>
        <!-- slider-area-start -->
        <div class="slider-area">
            <div class="swiper-container slider__active">
                <div class="slider-wrapper swiper-wrapper">
                  @foreach($slider as $row)
                    <div class="single-slider swiper-slide slider-height d-flex align-items-center" data-background="{{asset($row->image)}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="slider-content">
                                        <div class="slider-top-btn" data-animation="fadeInLeft" data-delay="1.5s">
                                            <a href="product-details.html" class="st-btn b-radius">{{ $row->type }}</a>
                                        </div>
                                        <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">{{ $row->first_caption }}</h2>
                                        <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">{{ $row->last_caption}}</p>
                                        <div class="slider-bottom-btn mt-75">
                                            <a data-animation="fadeInUp" data-delay="1.15s" href="{{ $row->action_url }}" class="st-btn-b b-radius">{{ $row->action_text }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach<!-- /single-slider -->
              
                    <div class="main-slider-paginations"></div>
                </div>
            </div>
        </div>
        <!-- slider-area-end -->

        <!-- features__area-start -->
        <section class="features__area pt-20">
            <div class="container">
                <div class="row row-cols-xxl-4 row-cols-xl-4 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 gx-0">
                  @foreach($service as $row)
                    <div class="col">
                        <div class="features__item d-flex white-bg">
                            <div class="features__icon mr-20">
                                <i class="{{ $row->icon }}"></i>
                            </div>
                            <div class="features__content">
                                <h6>{{ $row->name }}</h6>
                                <p>{{ $row->detail }}</p>
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </section>
        <!-- features__area-end -->

     

        <!-- topsell__area-start -->
        <section class="topsell__area-1 pt-15">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-10">
                            <div class="section__title">
                                <h5 class="st-titile-d">Top Deals Of The Day</h5>
                            </div>
                            <div class="offer-time">
                                <span class="offer-title d-none d-sm-block">Hurry Up! Offer ends in:</span>
                                <div class="countdown">
                                    <div class="countdown-inner b-radius" data-countdown="" data-date="{{ Carbon\Carbon::parse($flash_sale->sale_date)->format('Y/m/d')}}">
                                        <ul class="text-center">
                                            <li><span data-days=""></span> Days</li>
                                            <li><span data-hours=""></span> Hours</li>
                                            <li><span data-minutes=""></span> Mins</li>
                                            <li><span data-seconds=""></span> Secs</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product-bs-slider">
                        <div class="product-slider swiper-container">
                            <div class="swiper-wrapper">
                              @foreach($flash_product as $row)
                                <div class="product__item swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img">
                                            <a href="product-details.html">
                                                <img src="{{asset('frontend')}}/assets/img/product/{{$row->image}}" alt="product">
                                            </a>
                                        </div>
                                       
                                    
                                       
                                        @if($row->discount_price && $row->discount_price < $row->price)
                                        <div class="product__offer">
                                        <span class="discount">-{{round(($row->discount_price*100)/$row->price)}}%</span>
                                        </div>
                                        @endif
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId{{ $loop->index }}">
                                                <i class="fal fa-eye"></i>
                                                <i class="fal fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fal fa-heart"></i>
                                                <i class="fal fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fal fa-layer-group"></i>
                                                <i class="fal fa-layer-group"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @php
                                        $falsh_product_rating=0;
                                    @endphp
                                    
                                    @foreach($row->orderitem->where('rstatus',1) as $orderitem)
                                       @php
                                         $falsh_product_rating+=$orderitem->review->rating;
                                       @endphp
                                    @endforeach
                                    <div class="product__content">
                                        <h6><a href="product-details.html">{{ $row->name }}</a></h6>
                                        <div class="rating mb-5">
                                            <ul>
                                              @for($i=1;$i<=5;$i++)
                                                 @if($i<=$falsh_product_rating)
                                                   <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                 @else
                                                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                 @endif
                                              @endfor
                                               
                                            </ul>
                                            <span>(01 review)</span>
                                        </div>
                                        @if($row->discount_price > 0)
                                        <div class="price mb-10">
                                            <span>${{ $row->discount_price }}-$<del>{{ $row->price }}</del></span>
                                        </div>
                                        @else
                                        <div class="price mb-10">
                                            <span>${{ $row->price }}</span>
                                        </div>
                                        
                                        @endif
                                        <div class="progress mb-5">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{round(($row->orderitem_sum_quantity*100)/$row->quantity)}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="progress-rate">
                                            <span>Sold:{{$row->orderitem_sum_quantity}}/{{ $row->quantity }}</span>
                                        </div>
                                    </div>
                                    @if($row->orderitem_sum_quantity>=$row->quantity)
                                    <div class="product__add-cart text-center">
                                        <a class=" bg-link product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100 " style="backgroung-color:silver;">
                                        Sold Out
                                        </a>
                                    </div>
                                    @else
                                    <div class="product__add-cart text-center">
                                        <button type="button" class=" cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Add to Cart
                                        </button>
                                    </div>
                                    @endif
                                </div>
                              @endforeach
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="bs-button bs-button-prev"><i class="fal fa-chevron-left"></i></div>
                        <div class="bs-button bs-button-next"><i class="fal fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- topsell__area-end -->

        <!-- banner__area-start -->
        <section class="banner__area banner__area-d pb-10">
            <div class="container">
                <div class="row">
                  @foreach($head_banner as $banner)
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="banner__item p-relative w-img mb-30">
                            <div class="banner__img">
                                <a href="{{ $banner->action_url }}"><img src="{{asset( $banner->image )}}" alt=""></a>
                            </div>
                            <div class="banner__content">
                                <span>Bestseller Products</span>
                                <h6><a href="{{ $banner->action_url }}">{{ $banner->first_caption}}</a></h6>
                                <p>{{ $banner->last_caption }}</p>
                            </div>
                        </div>
                    </div>
                  @endforeach
                   
                </div>
            </div>
        </section>
        <!-- banner__area-end -->

        <!-- topsell__area-start -->
        <section class="topsell__area-2 pt-15">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-10">
                            <div class="section__title">
                                <h5 class="st-titile">Top Selling Products</h5>
                            </div>
                            <div class="product__nav-tab"> 
                                <ul class="nav nav-tabs" id="flast-sell-tab" role="tablist">
                                  @foreach($subcategoryChild as $key=>$row)
                                    <li class="nav-item" role="presentation">
                                      <button class="nav-link {{ $key==0?'active':''}}" id="computer-tab" data-bs-toggle="tab" data-bs-target="#computer_{{ $row->id }}" type="button" role="tab" aria-controls="computer" aria-selected="false">{{ $row->name}}</button>
                                    </li>
                                  @endforeach
                                  </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tab-content" id="flast-sell-tabContent">
                            @foreach($subcategoryChild as $key=>$sub)
                            <div class="tab-pane fade {{ $key==0?'active':''}} show" id="computer_{{$sub->id}}" role="tabpanel" aria-labelledby="computer-tab">
                                <div class="product-bs-slider-2">
                                    <div class="product-slider-2 swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach($topSelling_Product->where('subcategory_child_id',$sub->id)->take(10) as $row)
                                            <div class="product__item swiper-slide">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="product-details.html">
                                                            <img src="{{asset('frontend')}}/assets/img/product/{{$row->image}}" alt="product">
                                                        </a>
                                                    </div>
                                                   
                                                    @if($row->discount_price > 0 && $row->discount_price<$row->price)
                                                    <div class="product__offer">
                                                    <span class="discount">-{{round($row->discount_price*100/$row->price)}}%</span>
                                                    </div>
                                                    
                                                    @endif
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId{{ $loop->index }}">
                                                            <i class="fal fa-eye"></i>
                                                            <i class="fal fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fal fa-heart"></i>
                                                            <i class="fal fa-heart"></i>
                                                        </a>
                                                        <a href="#" class="icon-box icon-box-1">
                                                            <i class="fal fa-layer-group"></i>
                                                            <i class="fal fa-layer-group"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                @php 
                                                  $top_product_rating=0;
                                                @endphp
                                                @foreach($row->orderitem->where('rstatus',1) as $orderitem)
                                                  @php
                                                      $top_product_rating+=$orderitem->review->rating;
                                                  @endphp
                                                @endforeach
                                                <div class="product__content">
                                                    <h6><a href="product-details.html">{{ $row->name }}</a></h6>
                                                    <div class="rating mb-5">
                                                        <ul>
                                                          @for($i=1;$i<=5;$i++)
                                                            @if($i<=$top_product_rating)
                                                               <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            @else
                                                               <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                            @endif
                                                          
                                                          @endfor
                                                          
                                                        </ul>
                                                        <span>({{$row->orderitem->where('rstatus',1)->count()}} review)</span>
                                                    </div>
                                                  @if($row->discount_price > 0)
                                                   <div class="price mb-10">
                                                     <span>${{ $row->discount_price }}-$<del>{{ $row->price }}</del></span>
                                                   </div>
                                                 @else
                                                  <div class="price mb-10">
                                                     <span>${{ $row->price }}</span>
                                                 </div>
                                        
                                                @endif
                                                </div>
                                                <div class="product__add-cart text-center">
                                                    <button type="button" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="bs-button bs2-button-prev"><i class="fal fa-chevron-left"></i></div>
                                    <div class="bs-button bs2-button-next"><i class="fal fa-chevron-right"></i></div>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- topsell__area-end -->

        <!-- featured-start -->
        <section class="featured light-bg pt-55 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-30">
                            <div class="section__title">
                                <h5 class="st-titile">Top Featured Products</h5>
                            </div>
                            <div class="button-wrap">
                                <a href="shop.html">See All Product <i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="single-features-item single-features-item-d b-radius mb-20">
                            <div class="row  g-0 align-items-center">
                              @foreach($featurab_product->random(1) as $row)
                                <div class="col-md-6">
                                    <div class="features-thum">
                                        <div class="features-product-image w-img">
                                            <a href="product-details.html"><img src="{{asset('frontend')}}/assets/img/product/{{ $row->image }}" alt=""></a>
                                        </div>
                                       
                                        @if($row->discount_price > 0 && $row->discount_price < $row->price)
                                        <div class="product__offer">
                                            <span class="discount">-{{ round($row->discount_price*100/$row->price)}}%</span>
                                        </div>
                                        @endif
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                <i class="fal fa-eye"></i>
                                                <i class="fal fa-eye"></i>
                                            </a>
                                            <a href="{{route('add_wishlist',$row->id)}}" class="icon-box icon-box-1">
                                                <i class="fal fa-heart"></i>
                                                <i class="fal fa-heart"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fal fa-layer-group"></i>
                                                <i class="fal fa-layer-group"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @php
                                  $featurab_product_rating=0;
                                @endphp
                                
                                @foreach($row->orderitem->where('rstatus',1) as $orderitem)
                                   @php
                                     $featurab_product_rating+=$orderitem->review->rating;
                                   @endphp
                                @endforeach
                                <div class="col-md-6">
                                    <div class="product__content product__content-d">
                                        <h6><a href="product-details.html">{{ $row->name }}</a></h6>
                                        <div class="rating mb-5">
                                            <ul class="rating-d">
                                              @for($i=1;$i<=5;$i++)
                                                 @if($i<=$featurab_product_rating)
                                                     <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                 @else
                                                      <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                 @endif
                                              @endfor

                                            </ul>
                                            <span>({{$row->orderitem->where('rstatus',1)->count()}} review)</span>
                                        </div>
                                        <div class="price d-price mb-10">
                                            <span> @if($row->discount_price) ${{$row->discount_price}} <del>${{ $row->price}}</del> @else ${{$row->price}} @endif </span>
                                        </div>
                                        <div class="features-des mb-25">
                                            <ul>
                                                <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                                <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                                <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                                <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                            </ul>
                                        </div>
                                        <div class="cart-option">
                                            <a href="#" class="cart-btn-2 w-100 mr-10">Add to Cart</a>
                                            <a href="{{route('add_wishlist',$row->id)}}" class="transperant-btn"><i class="fal fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="row">
                          @foreach($featurab_product as $row)
                            <div class="col-md-6">
                                <div class="single-features-item b-radius mb-20">
                                    <div class="row  g-0 align-items-center">
                                        <div class="col-6">
                                            <div class="features-thum">
                                                <div class="features-product-image w-img">
                                                    <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/img/product/{{ $row->image }}" alt=""></a>
                                                </div>
                                                @if($row->discount_price > 0 && $row->discount_price < $row->price)
                                                <div class="product__offer">
                                                    <span class="discount">-{{ round($row->discount_price*100/$row->price) }}%</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                          $featurab_product_rating=0;
                                        @endphp
                                        @foreach($row->orderitem->where('rstatus',1) as $orderitem)
                                            @php
                                              $featurab_product_rating+=$orderitem->review->rating;
                                            @endphp
                                        @endforeach
                                        <div class="col-6">
                                            <div class="product__content product__content-d">
                                                <h6><a href="product-details.html">{{ $row->name }}</a></h6>
                                                <div class="rating mb-5">
                                                    <ul>
                                                      @for($i=1;$i<=5;$i++)
                                                         @if($i<=$featurab_product_rating)
                                                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                         @else
                                                           <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                         @endif
                                                      @endfor
                                                      
                                                    </ul>
                                                    <span>({{$row->orderitem->where('rstatus',1)->count()}} review)</span>
                                                </div>
                                                <div class="price d-price">
                                                       <span> @if($row->discount_price) ${{$row->discount_price}} <del>${{ $row->price}}</del> @else ${{$row->price}} @endif </span>
                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                  
                    </div>
                </div>
            </div>
        </section>
        <!-- featured-end -->

        <!-- moveing-text-area-start -->
        <section class="moveing-text-area">
            <div class="container">
                <div class="ovic-running">
                    <div class="wrap">
                        <div class="inner">
                            <p class="item">Free UK Delivery - Return Over $100.00 ( Excluding Homeware )   |   Free UK Collect From Store</p>
                            <p class="item">Design Week / 15% Off the website / Code: AYOSALE-2020</p>
                            <p class="item">Always iconic. Now organic. Introducing the $20 Organic Tee.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- moveing-text-area-end -->

        <!-- banner__area-start -->
        <section class="banner__area pt-60 pb-25">
            <div class="container">
                <div class="row">
                  @forelse($foot_banner as $banner)
                    <div class="col-xl-4 col-lg-6 col-md-12">
                        <div class="banner__item p-relative w-img mb-30">
                            <div class="banner__img">
                                <a href="product-details.html"><img src="{{asset($banner->image )}}" alt=""></a>
                            </div>
                            <div class="banner__content banner__content-sd text-center">
                                <div class="banner-button mb-20">
                                    <a href="{{ $banner->action_url }}" class="st-btn">{{ $banner->type }}</a>
                                </div>
                                <h6><a href="{{ $banner->action_url }}">{{ $banner->first_caption}}<br> {{ $banner->last_caption }}</a></h6>
                            </div>
                        </div>
                        @empty
                         <h4 class="text-center"> Not Found </h4>
                    </div>
                   @endforelse
                   
                </div>
            </div>
        </section>
        <!-- banner__area-end -->

        <!-- recomand-product-area-start -->
        <section class="recomand-product-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__head d-flex justify-content-between mb-10">
                            <div class="section__title">
                                <h5 class="st-titile">Recommended For You</h5>
                            </div>
                            <div class="button-wrap">
                                <a href="{{ route('product_page')}}">See All Product <i class="fal fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="product-bs-slider-2">
                        <div class="product-slider-3 swiper-container">
                            <div class="swiper-wrapper">
                              @foreach($product->take(10) as $products)
                                <div class="product__item mb-20 swiper-slide">
                                    <div class="product__thumb fix">
                                        <div class="product-image w-img">
                                            <a href="{{ route('product_detail',$products->slug) }}">
                                                <img src="{{ asset('frontend') }}/assets/img/product/{{ $products->image }}" alt="product">
                                            </a>
                                        </div>
                                       
                                        @if($products->discount_price<$products->price)
                                        
                                         <div class="product__offer">
                                        <span class="discount">-{{round($products->discount_price*100/$products->price)}}%</span>
                                        </div>
                                        @endif
                                        <div class="product-action">
                                            <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId{{ $loop->index }}">
                                                <i class="fal fa-eye"></i>
                                                <i class="fal fa-eye"></i>
                                            </a>
                                            <a href="#" class="icon-box icon-box-1">
                                                <i class="fal fa-heart"></i>
                                                <i class="fal fa-heart"></i>
                                            </a>
                                           
                                        </div>
                                    </div>
                                    @php
                                       $product_rating=0;
                                    @endphp
                                    @foreach($products->orderitem->where('rstatus',1) as $orderitem)
                                       @php
                                          $product_rating+=$orderitem->review->rating;
                                       @endphp
                                    @endforeach
                                    <div class="product__content">
                                        <h6><a href="{{ route('product_detail',$products->slug) }}">{{ $products->name }}</a></h6>
                                        <div class="rating mb-5">
                                            <ul>
                                              @for($i=1;$i<=5;$i++)
                                                 @if($i<=$product_rating)
                                                     <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                 @else
                                                     <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                 @endif
                                              @endfor
                                                
                                            </ul>
                                            <span>({{$products->orderitem->where('rstatus',1)->count()}} review)</span>
                                        </div>
                                        <div class="price">
                                            <span>@if($products->discount_price) ${{$products->discount_price}} - <del>${{$products->price}}</del> @else ${{$products->price}}  @endif</span>
                                        </div>
                                    </div>
                                    <div class="product__add-cart text-center">
                                        <a href="{{ route('add_cart',$products->id) }}" class="cart-btn product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100">
                                        Add to Cart
                                        </a>
                                    </div>
                                </div>
                              @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- recomand-product-area-end -->

        
        <!-- cta-area-start -->
        <section class="cta-area d-ldark-bg pt-55 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item cta-item-d mb-30">
                            <h5 class="cta-title">Follow Us</h5>
                            <p>We make consolidating, marketing and tracking your social media website easy.</p>
                            <div class="cta-social">
                                <div class="social-icon">
                                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="rss"><i class="fas fa-rss"></i></a>
                                    <a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item mb-30">
                            <h5 class="cta-title">Sign Up To Newsletter</h5>
                            <p>Join 60.000+ subscribers and get a new discount coupon  on every Saturday.</p>
                            <div class="subscribe__form">
                                <form action="#">
                                    <input type="email" placeholder="Enter your email here...">
                                    <button>subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="cta-item mb-30">
                            <h5 class="cta-title">Download App</h5>
                            <p>DukaMarket App is now available on App Store & Google Play. Get it now.</p>
                            <div class="cta-apps">
                                <div class="apps-store">
                                    <a href="#"><img src="assets/img/brand/app_ios.png" alt=""></a>
                                    <a href="#"><img src="assets/img/brand/app_android.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- cta-area-end -->
    

    </main>
@endsection