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
                    <div class="col-xl-3 col-lg-4">
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Product categories</h5>
                            <div class="widget-category-list mt-20">
                                <form action="#">
                                  @foreach($subcategory_child as $row )
                                   @if(in_array($row->id,$unique_subcategory))
                                    <div class="single-widget-category">
                                        <input checked type="checkbox" onclick="subcategoryFilter({{ $row->id }},1)" id="cat-item-{{ $loop->index }}" name="cat-item">
                                        <label for="cat-item-{{ $loop->index }}">{{ $row->name}}</label>
                                    </div>
                                  @else
                                    <div class="single-widget-category">
                                        <input  type="checkbox" onclick="subcategoryFilter({{ $row->id }},0)" id="cat-item-{{ $loop->index }}" name="cat-item">
                                        <label for="cat-item-{{ $loop->index }}">{{ $row->name}}</label>
                                    </div>
                                  @endif
                                  @endforeach
                                </form>
                                <form id="sub_form">
                                  <input type="text" id="subId" name="subcategory" value="{{ $subcategory }}">
                                </form>
                            </div>
                        </div>
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Filter By Price</h5>
                            <div class="price__slider mt-30">
                                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                                <div>
                                    <form action="#" class="s-form mt-20">
                                        <input type="text" id="amount" readonly="">
                                        <button type="submit" class="tp-btn-square-lg">Filter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if(!empty($color[0]->id))
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Choose Size</h5>
                            <div class="widget-category-list mt-20">
                                <form action="#">
                                  @foreach($color as $colors)
                                    <div class="single-widget-category">
                                        <input type="checkbox" id="choose-item-{{ $loop->index }}" name="choose-item">
                                        <label for="choose-item-{{ $loop->index }}">{{ $colors->name }} <span>(12)</span></label>
                                    </div>
                                  @endforeach
                                </form>
                            </div>
                        </div>
                        @endif
                        @if($review[0]->rating >= 1)
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Choose Rating</h5>
                            <div class="widget-category-list mt-20">
                                <form action="#">
                                  @foreach($review as $rating)
                                    <div class="single-widget-rating">
                                      @if($rating->rating == $ratings)
                                        <input type="checkbox" checked onclick="rating({{$rating->rating }},1)" id="star-item-{{$rating->rating}}" name="star-item" >
                                      @else
                                        <input type="checkbox" onclick="rating({{$rating->rating }},0)" id="star-item-{{$rating->rating}}" name="star-item" >
                                      @endif
                                        <label for="star-item-{{ $rating->rating }}">
                                          @for($i=1;$i<=$rating->rating;$i++)
                                            <i class="fas fa-star"></i>
                                          @endfor
                                          @for($j=$rating->rating+1;$j<=5;$j++)
                                            <i class="fal fa-star"></i>
                                          @endfor
                                         
                                        </label>
                                    </div>
                                    @endforeach
                                </form>
                                <form id="rating_form">
                                  <input type="hidden" id="rating" name="rating" value="{{ $ratings }}">
                                </form>
                                  
                            </div>
                        </div>
                        @endif
                        @if(!empty($size[0]->id))
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Choose Size</h5>
                            <div class="widget-category-list mt-20">
                                <form>
                                  @foreach($size as $sizes)
                                  @if(in_array($sizes->id,$unique_size))
                                    <div class="single-widget-category">
                                        <input checked type="checkbox" onclick="sizeFilter({{$sizes->id}},1)" id="choose-item-{{ $loop->index }}" >
                                        <label for="choose-item-{{ $loop->index }}">{{ $sizes->name }} <span></span></label>
                                    </div>
                                    @else
                                    <div class="single-widget-category">
                                        <input type="checkbox" onclick="sizeFilter({{$sizes->id}},0)" id="choose-item-{{ $loop->index }}" >
                                        <label for="choose-item-{{ $loop->index }}">{{ $sizes->name }} <span></span></label>
                                    </div>
                                   @endif
                                  @endforeach
                                </form>
                            </div>
                        </div>
                        <form id="size_form">
                          <input type="text" id="sizeId"name="size" value="{{ $sizeId }}">
                        </form>
                        
                        @endif
                      @if(!empty($brand[0]->id))
                        <div class="product-widget mb-30">
                            <h5 class="pt-title">Choose Brand</h5>
                            <div class="widget-category-list mt-20">
                                <form action="#">
                                 @foreach($brand as $brands)
                                    <div class="single-widget-category">
                                        <input type="checkbox" id="brand-item-1" name="brand-item">
                                        <label for="brand-item-1">{{ $brands->name }} <span>(12)</span></label>
                                    </div>
                                  @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <div class="col-xl-9 col-lg-8">
                      @foreach($categorybanner as $row)
                        <div class="shop-banner mb-30">
                            <div class="banner-image">
                                <img class="banner-l" src="{{asset($row->image)}}" alt="">
                                <img class="banner-sm" src="assets/img/banner/sl-banner-sm.png" alt="">
                                <div class="banner-content text-center">
                                    <p class="banner-text mb-30">Hurry Up! <br> Free Shipping All Order Over $99</p>
                                    <a href="{{$row->action_url}}" class="st-btn-d b-radius">{{ $row->action_text}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                                        <div class="product__filter-right d-flex align-items-center justify-content-md-end">
                                            <div class="product__sorting product__show-no">
                                                <select>
                                                    <option>10</option>
                                                    <option>20</option>
                                                    <option>30</option>
                                                    <option>40</option>
                                                </select>
                                            </div>
                                            <div class="product__sorting product__show-position ml-20">
                                                <select>
                                                    <option>Latest</option>
                                                    <option>New</option>
                                                    <option>Up comeing</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </div>
                        <div class="tab-content" id="productGridTabContent">
                            <div class="tab-pane fade  show active" id="FourCol" role="tabpanel" aria-labelledby="FourCol-tab">
                                <div class="tp-wrapper">
                                    <div class="row g-0">
                                      @foreach($product as $products)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                            <div class="product__item product__item-d">
                                                <div class="product__thumb fix">
                                                    <div class="product-image w-img">
                                                        <a href="product-details.html">
                                                            <img src="{{asset('frontend')}}/assets/img/product/{{ $products->image }}" alt="product">
                                                        </a>
                                                    </div>
                                                    <div class="product-action">
                                                        <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
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
                                                <div class="product__content-3">
                                                    <h6><a href="product-details.html">{{ $products->name }}</a></h6>
                                                    <div class="rating mb-5">
                                                        <ul>
                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                        </ul>
                                                        <span>(01 review)</span>
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
                                                    <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                    <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        Quick View
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                       @endforeach
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="FiveCol" role="tabpanel" aria-labelledby="FiveCol-tab">
                                <div class="tp-wrapper-2">
                                    <div class="single-item-pd">
                                        <div class="row align-items-center">
                                            <div class="col-xl-9">
                                                <div class="single-features-item single-features-item-df b-radius mb-20">
                                                    <div class="row  g-0 align-items-center">
                                                        <div class="col-md-4">
                                                            <div class="features-thum">
                                                                <div class="features-product-image w-img">
                                                                    <a href="product-details.html"><img src="assets/img/product/sm-1.jpg" alt=""></a>
                                                                </div>
                                                                <div class="product__offer">
                                                                    <span class="discount">-15%</span>
                                                                </div>
                                                                <div class="product-action">
                                                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
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
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="product__content product__content-d">
                                                                <h6><a href="product-details.html">Classic Leather Backpack Daypack 2022</a></h6>
                                                                <div class="rating mb-5">
                                                                    <ul class="rating-d">
                                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                    </ul>
                                                                    <span>(01 review)</span>
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
                                                    <h5>Availability: <span> 940 in stock</span></h5>
                                                    <h6>$220.00 - <del> $240.00</del></h6>
                                                </div>
                                                <div class="stock-btn ">
                                                    <button type="button" class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100">
                                                    Add to Cart
                                                    </button>
                                                    <button type="button" class="wc-checkout d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#productModalId">
                                                        Quick View
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
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