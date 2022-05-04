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

        <!-- shop-area-start -->
        <div class="shop-area mb-20">
            <div class="container">
                <div class="row">

                    <div class="col-xl-9 col-lg-8">
                        <div class="product-lists-top">
                            <div class="product__filter-wrap">
                                <div class="row align-items-center">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        <div class="product__filter d-sm-flex align-items-center">
                                            <div class="product__col">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                      <button class="nav-link active" id="FourCol-tab" data-bs-toggle="tab" data-bs-target="#FourCol" type="button" role="tab" aria-controls="FourCol" aria-selected="true">
                                                        <i class="fal fa-th"></i>
                                                      </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                      <button class="nav-link" id="FiveCol-tab" data-bs-toggle="tab" data-bs-target="#FiveCol" type="button" role="tab" aria-controls="FiveCol" aria-selected="false">
                                                        <i class="fal fa-list"></i>
                                                      </button>
                                                    </li>
                                                  </ul>
                                            </div>
                                            <div class="product__result pl-60">
                                                <p>Showing 1-20 of 29 relults</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                        
                                    </div>
                                </div>
                        </div>
                        </div>
                        <div class="tab-content" id="productGridTabContent">
                            <div class="tab-pane fade  show active" id="FourCol" role="tabpanel" aria-labelledby="FourCol-tab">
                                <div class="tp-wrapper">
                                    <div class="row g-0">
                                   
                                      @forelse($product as $products)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                            <div class="product__item product__item-d">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="{{ route('product_detail',$products->slug) }}">
                                                            <img src="{{asset('frontend')}}/assets/img/product/{{ $products->image }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId{{$loop->index}}">
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
                                                <div class="product__content-3">
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
                                                    <div class="price mb-10">
                                                        <span>
                                                      @if ($products->discount_price) 
                                                        ${{$products->discount_price}} -${{$products->price}}
                                                      @else
                                                        ${{$products->price}}
                                                      @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="product__add-cart-s text-center">
                                                    <a href="{{ route('add_cart',$products->id) }}" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </a>
                                                    <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId{{$loop->index}}">
                                                        Quick View
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                          <h2 class="text-center"> Product Not Found</h2>
                                       @endforelse
                                      
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="FiveCol" role="tabpanel" aria-labelledby="FiveCol-tab">
                                <div class="tp-wrapper-2">
                                  @foreach($product as $row)
                                    <div class="single-item-pd">
                                        <div class="row align-items-center">
                                            <div class="col-xl-9">
                                                <div class="single-features-item single-features-item-df b-radius mb-20">
                                                    <div class="row  g-0 align-items-center">
                                                        <div class="col-md-4">
                                                            <div class="features-thum">
                                                                <div class="features-product-image w-img">
                                                                    <a href="{{ route('product_detail',$row->slug) }}"><img src="{{asset('frontend')}}/assets/img/product/{{ $row->image }}" alt=""></a>
                                                                </div>
                                                                @if($row->discount_price > 0 && $row->discount_price < $row->price)
                                                                <div class="product__offer">
                                                                    <span class="discount">-{{round($row->discount_price*100/$row->price)}}%</span>
                                                                </div>
                                                                @endif
                                                                <div class="product-action">
                                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                                        <i class="fal fa-eye"></i>
                                                                        <i class="fal fa-eye"></i>
                                                                    </a>
                                                                    <a href="#" class="icon-box icon-box-1">
                                                                        <i class="fal fa-heart"></i>
                                                                        <i class="fal fa-heart"></i>
                                                                    </a>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                          $rating_product=0;
                                                        @endphp
                                                        @foreach($row->orderitem->where('rstatus',1) as $orderitem)
                                                         @php
                                                            $rating_product+=$orderitem->review->rating;
                                                         @endphp
                                                        @endforeach
                                                        <div class="col-md-8">
                                                            <div class="product__content product__content-d">
                                                                <h6><a href="product-details.html">{{ $row->name }}</a></h6>
                                                                <div class="rating mb-5">
                                                                    <ul class="rating-d">
                                                                      @for($i=1;$i<=5;$i++)
                                                                        @if($i<=$rating_product)
                                                                           <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        @else
                                                                           <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        @endif
                                                                        
                                                                      @endfor

                                                                    </ul>
                                                                    <span>({{$row->orderitem->where('rstatus',1)->count()}} review)</span>
                                                                </div>
                                                                <div class="features-des">
                                                                    <ul>
                                                                        <li><a href="product-details.html"><i class="fas fa-circle"></i> Bass and Stereo Sound.</a></li>
                                                                        <li><a href="product-details.html"><i class="fas fa-circle"></i> Display with 3088 x 1440 pixels resolution.</a></li>
                                                                        <li><a href="product-details.html"><i class="fas fa-circle"></i> Memory, Storage &amp; SIM: 12GB RAM, 256GB.</a></li>
                                                                        <li><a href="product-details.html"><i class="fas fa-circle"></i> Androi v10.0 Operating system.</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="product-stock mb-15">
                                                    <h5>Availability: <span> {{ $row->quantity}} in stock</span></h5>
                                                    @if($row->discount_price)
                                                    <h6>${{ $row->discount_price }} - <del> ${{ $row->price }}</del></h6>
                                                    @else
                                                    <h6>${{ $row->price }}</h6>
                                                    @endif
                                                </div>
                                                <div class="stock-btn ">
                                                    <a href="{{ route('add_cart',$row->id) }}" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </a>
                                                    <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        Quick View
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  @endforeach
                                   
                                </div>
                            </div>
                        </div>
                        <div class="tp-pagination text-center">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="basic-pagination pt-30 pb-30">
                                        <nav>
                                           <ul>
                                              <li>
                                                 <a href="shop.html" class="active">1</a>
                                              </li>
                                              <li>
                                                 <a href="shop.html">2</a>
                                              </li>
                                              <li>
                                                 <a href="shop.html">3</a>
                                              </li>
                                             <li>
                                                <a href="shop.html">5</a>
                                             </li>
                                             <li>
                                                <a href="shop.html">6</a>
                                             </li>
                                              <li>
                                                 <a href="shop.html">
                                                    <i class="fal fa-angle-double-right"></i>
                                                 </a>
                                              </li>
                                           </ul>
                                         </nav>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop-area-end -->



    </main>

@endsection
