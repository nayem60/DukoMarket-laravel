<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from themepure.net/template/dukamarket/dukamarket/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Feb 2022 17:21:09 GMT -->
<head>
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Duka Market - Clean, Minimal E-commerce HTML5 Template</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ setting()->icon ?? "" }}">
      <!-- CSS here -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/preloader.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/meanmenu.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/animate.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl-carousel.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/swiper-bundle.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/backtotop.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/magnific-popup.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/nice-select.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/flaticon/flaticon.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/font-awesome-pro.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/default.css">
      <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/style.css">
      @stack('style')
   </head>
   <body>
      

    <!-- back to top start -->
    <div class="progress-wrap">
         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
    </div>
      <!-- back to top end -->
      
    <!-- header-start -->
    <header class="header d-blue-bg">
        <div class="header-top">
            <div class="container">
                <div class="header-inner">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-7">
                            <div class="header-inner-start">
                                <div class="header__currency border-right">
                                    <div class="s-name">
                                        <span>Language: </span>
                                    </div>
                                    <select>
                                        <option>English</option>
                                        <option>Deutsch</option>
                                        <option>Français</option>
                                        <option>Espanol</option>
                                    </select>
                                </div>
                                <div class="header__lang border-right">
                                    <div class="s-name">
                                        <span>Currency: </span>
                                    </div>
                                    <select>
                                        <option> USD</option>
                                        <option>EUR</option>
                                        <option>INR</option>
                                        <option>BDT</option>
                                        <option>BGD</option>
                                    </select>
                                </div>
                                <div class="support d-none d-sm-block">
                                    <p>Need Help? <a href="tel:+{{ setting()->number ?? ""}}">+{{ setting()->number?? "" }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                            <div class="header-inner-end text-md-end">
                                <div class="ovic-menu-wrapper">
                                    <ul>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="contact.html">Order Tracking</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="faq.html">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid">
            <div class="container">
                <div class="heade-mid-inner">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                            <div class="header__info">
                                <div class="logo">
                                    <a href="/" class="logo-image"><img src="{{ asset(setting()->logo ?? "" ) }}" alt="logo"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <div class="header__search">
                                <form action="#">
                                    <div class="header__search-box">
                                        <input class="search-input" type="text" placeholder="I'm shopping for...">
                                        <button class="button" type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                    <div class="header__search-cat">
                                        <select>
                                            <option>All Categories</option>
                                            <option>Best Seller Products</option>
                                            <option>Top 10 Offers</option>
                                            <option>New Arrivals</option>
                                            <option>Phones &amp; Tablets</option>
                                            <option>Electronics &amp; Digital</option>
                                            <option>Fashion &amp; Clothings</option>
                                            <option>Jewelry &amp; Watches</option>
                                            <option>Health &amp; Beauty</option>
                                            <option>Sound &amp; Speakers</option>
                                            <option>TV &amp; Audio</option>
                                            <option>Computers</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-8 col-sm-8 ">
                            <div class="header-action ">
                                <div class="block-userlink">
                                    <a class="icon-link" href="{{ route('user_profile') }}">
                                    <i class="flaticon-user"></i>
                                    <span class="text">
                                     @if(Route::has('login'))
                                     @auth
                                    <span class="sub"> My Account</span>
                                       {{ Auth::user()->name }}</span>
                                    </a>
                                     @endauth
                                     @else
                                    <span class="sub">Login </span>
                                    My Account </span>
                                    </a>
                                    @endif
                                </div>
                                @php
                                   $wishlist=App\Models\wishlist::where('user_id',Auth::user()->id)->get();
                                @endphp
                                <div class="block-wishlist action reload-wishlist">
                                    <a class="icon-link " href="{{ route('wishlist') }}">
                                    <i class="flaticon-heart"></i>
                                    <span class="count ">{{count($wishlist)}}</span>
                                    <span class="text">
                                    <span class="sub">Favorite</span>
                                    My Wishlist </span>
                                    </a>
                                </div>
                                <div class="block-cart action reload-cart">
                                    <a class="icon-link" href="{{ route('cart') }}">
                                    <i class="flaticon-shopping-bag"></i>
                                    <span class="count">{{ cart_count(Auth::user()->id || 0) }}</span>
                                    <span class="text">
                                    <span class="sub">Your Cart:</span>
                                    ${{ number_format(totals(Auth::user()->id),2,'.','') }} </span>
                                    </a>
                                    <div class="cart">
                                        <div class="cart__mini">
                                            <ul>
                                                <li>
                                                  <div class="cart__title">
                                                    <h4>Your Cart</h4>
                                                    
                                                  </div>
                                                </li>
                                                @foreach(cart(Auth::user()->id) as $carts)
                                                <li>
                                                  <div class="cart__item d-flex justify-content-between align-items-center">
                                                    <div class="cart__inner d-flex">
                                                      <div class="cart__thumb">
                                                        <a href="{{route('product_detail',$carts->product->slug)}}">
                                                          <img src="{{ asset('frontend') }}/assets/img/product/{{ $carts->product->image }}" alt="">
                                                        </a>
                                                      </div>
                                                      <div class="cart__details">
                                                        <h6><a href="{{route('product_detail',$carts->product->slug)}}"> {{ $carts->product->name }} </a></h6>
                                                        <div class="cart__price">{{ $carts->quantity }} ×
                                                          <span>$
                                                          @if($carts->variant)
                                                             V-{{ $carts->variant->price*$carts->quantity }}
                                                          @elseif($carts->product->discount_price*$carts->quantity)
                                                             D-{{ $carts->product->discount_price * $carts->quantity }}
                                                          @else
                                                             R-{{ $carts->product->price*$carts->quantity}} 
                                                          @endif
                                                          </span>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="cart__del">
                                                        <a href="javascript:void(0)" onclick="cartDel({{ $carts->id }})"><i class="fal fa-times"></i></a>
                                                    </div>
                                                  </div>
                                                </li>
                                                @endforeach
                                                <li>
                                                  <div class="cart__sub d-flex justify-content-between align-items-center">
                                                    <h6>Subtotal</h6>
                                                    <span class="cart__sub-total">${{ number_format(totals(Auth::user()->id),2,'.','') }}</span>
                                                  </div>
                                                </li>
                                                <li>
                                                    <a href="{{ route('cart')}}" class="wc-cart mb-10">View cart</a>
                                     
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
        <div class="header__bottom">
            <div class="container">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-3">                        
                        <div class="cat__menu-wrapper side-border d-none d-lg-block">
                            <div class="cat-toggle">
                                <button type="button" class="cat-toggle-btn cat-toggle-btn-1"><i class="fal fa-bars"></i> Shop by department</button>
                                <div class="cat__menu">
                                    <nav id="mobile-menu" style="display: block;">
                                        <ul>
                                          @foreach(category() as $cat)
                                            <li>
                                                <a href="javascript:void(0)">{{ $cat->title }}<i class="far fa-angle-down"></i></a>
                                                        <ul class="mega-item">
                                                          @foreach($cat->subcategory as $sub)
                                                            <li><a href="{{ route('shop',$sub->slug)}}">{{ $sub->title }}</a></li>
                                                         @endforeach
                                                        </ul>
                                                    </li>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-3">
                      <div class="header__bottom-left d-flex d-xl-block align-items-center">
                        <div class="side-menu d-lg-none mr-20">
                          <button type="button" class="side-menu-btn offcanvas-toggle-btn"><i class="fas fa-bars"></i></button>
                        </div>
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="index.html" class="active">Home <i class="far fa-angle-down"></i></a>
                                        <ul class="megamenu-1">
                                            <li><a href="index.html">Home Pages</a>
                                                <ul class="mega-item">
                                                    <li><a href="index.html" class="active">Home One</a></li>
                                                    <li><a href="index-2.html">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                    <li><a href="product-details.html">Shop 3 Column</a></li>
                                                    <li><a href="product-details.html">Shop 4 Column</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Product Pages</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">Product Details</a></li>
                                                    <li><a href="product-details.html">Product V2</a></li>
                                                    <li><a href="product-details.html">Product V3</a></li>
                                                    <li><a href="product-details.html">Varriable Product</a></li>
                                                    <li><a href="product-details.html">External Product</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Other Pages</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">wishlist</a></li>
                                                    <li><a href="product-details.html">Shopping Cart</a></li>
                                                    <li><a href="product-details.html">Checkout</a></li>
                                                    <li><a href="product-details.html">Login</a></li>
                                                    <li><a href="product-details.html">Register</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Phone &amp; Tablets</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">Catagory 1</a></li>
                                                    <li><a href="product-details.html">Catagory 2</a></li>
                                                    <li><a href="product-details.html">Catagory 3</a></li>
                                                    <li><a href="product-details.html">Catagory 4</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">Phone &amp; Tablets</a>
                                                <ul class="mega-item">
                                                    <li><a href="product-details.html">Catagory 1</a></li>
                                                    <li><a href="product-details.html">Catagory 2</a></li>
                                                    <li><a href="product-details.html">Catagory 3</a></li>
                                                    <li><a href="product-details.html">Catagory 4</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li class="has-mega"><a href="shop.html">Shop <i class="far fa-angle-down"></i></a>
                                        <div class="mega-menu">
                                            <div class="container container-mega">
                                                <ul>
                                                    <li>
                                                        <ul>
                                                        <li class="title"><a href="shop.html">SHOP LAYOUT</a></li>
                                                        <li><a href="shop.html">Pagination</a></li>
                                                        <li><a href="shop.html">Ajax Load More</a></li>
                                                        <li><a href="shop.html">Infinite Scroll</a></li>
                                                        <li><a href="shop.html">Sidebar Right</a></li>
                                                        <li><a href="shop.html">Sidebar Left</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                        <li class="title"><a href="shop.html">SHOP PAGES</a></li>
                                                        <li><a href="shop.html">List View</a></li>
                                                        <li><a href="shop.html">Small Products</a></li>
                                                        <li><a href="shop.html">Large Products</a></li>
                                                        <li><a href="shop.html">Shop — 3 Items</a></li>
                                                        <li><a href="shop.html">Shop — 4 Items</a></li>
                                                        <li><a href="shop.html">Shop — 5 Items</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                        <li class="title"><a href="shop.html">PRODUCT LAYOUT</a></li>
                                                        <li><a href="shop.html">Description Sticky</a></li>
                                                        <li><a href="shop.html">Product Carousel</a></li>
                                                        <li><a href="shop.html">Gallery Modern</a></li>
                                                        <li><a href="shop.html">Thumbnail Left</a></li>
                                                        <li><a href="shop.html">Thumbnail Right</a></li>
                                                        <li><a href="shop.html">Thumbnail Botttom</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                        <li class="title"><a href="shop.html">Basketball</a></li>
                                                        <li><a href="shop.html">East Hampton Fleece</a></li>
                                                        <li><a href="shop.html">Faxon Canvas Low</a></li>
                                                        <li><a href="shop.html">Habitasse Dictumst</a></li>
                                                        <li><a href="shop.html">Kaoreet Lobortis</a></li>
                                                        <li><a href="shop.html">NikeCourt Zoom</a></li>
                                                        <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                        <li class="title"><a href="shop.html">Basketball</a></li>
                                                        <li><a href="shop.html">East Hampton Fleece</a></li>
                                                        <li><a href="shop.html">Faxon Canvas Low</a></li>
                                                        <li><a href="shop.html">Habitasse Dictumst</a></li>
                                                        <li><a href="shop.html">Kaoreet Lobortis</a></li>
                                                        <li><a href="shop.html">NikeCourt Zoom</a></li>
                                                        <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-image hover-effect" style="background-image: url(assets/img/bg/menu-item.jpg);"> 
                                                        <ul>
                                                          <li><a href="shop.html">
                                                            <h4>Top Cameras <br> Bestseller Products</h4>
                                                            <h5>4K</h5>
                                                            <h6>Sale Up To <span>60% Off</span></h6>
                                                          </a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="offer mt-40">
                                                <p><b>30% OFF</b> the shipping of your first order with the code: <b>DUKA-SALE30</b></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="blog.html">Blog <i class="far fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="about.html">Pages <i class="far fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="faq.html">FAQs pages</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="404.html">404 Error</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-9">
                        <div class="shopeing-text text-sm-end">
                            <p>Spend $120 more and get free shipping!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
        <div class="offcanvas__close">
            <button class="offcanvas__close-btn" id="offcanvas__close-btn">
                <i class="fal fa-times"></i>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__logo mb-40">
                <a href="index.html">
                <img src="assets/img/logo/logo-white.png" alt="logo">
                </a>
            </div>
            <div class="offcanvas__search mb-25">
                <form action="{{ route('product_page') }}" method="get">
                    <input type="text" name="search" placeholder="search product?">
                    <button type="submit" ><i class="far fa-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu fix"></div>
            <div class="offcanvas__action">

            </div>
        </div>
        </div>
    </div>
    <!-- offcanvas area end -->      
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->
     @yield('main')

    <!-- footer-start -->
    <footer>
        <div class="fotter-area d-dark-bg">
            <div class="footer__top pt-80 pb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-4 order-last-md">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="footer__widget">
                                        <div class="footer__widget-title">
                                            <h4>Customer Care</h4>
                                        </div>
                                        <div class="footer__widget-content">
                                            <div class="footer__link">
                                                <ul>
                                                    <li><a href="faq.html">New Customers</a></li>
                                                    <li><a href="faq.html">How to use Account</a></li>
                                                    <li><a href="faq.html">Placing an Order</a></li>
                                                    <li><a href="faq.html">Payment Methods</a></li>
                                                    <li><a href="faq.html">Delivery &amp; Dispatch</a></li>
                                                    <li><a href="faq.html">Problems with Order</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="footer__widget">
                                        <div class="footer__widget-title">
                                            <h4>Customer Service</h4>
                                        </div>
                                        <div class="footer__widget-content">
                                            <div class="footer__link">
                                                <ul>
                                                    <li><a href="faq.html">Help Center</a></li>
                                                    <li><a href="faq.html">Contact Us</a></li>
                                                    <li><a href="faq.html">Report Abuse</a></li>
                                                    <li><a href="faq.html">Submit a Dispute</a></li>
                                                    <li><a href="faq.html">Policies &amp; Rules</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-8 order-first-md">
                            <div class="footer__top-left">
                                <div class="row">
                                    
                                    <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6">
                                        <div class="row">
                                            
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                <div class="footer__widget">
                                                    <div class="footer__widget-title">
                                                        <h4>My Account</h4>
                                                    </div>
                                                    <div class="footer__widget-content">
                                                        <div class="footer__link">
                                                            <ul>
                                                                <li><a href="faq.html">Product Support</a></li>
                                                                <li><a href="checkout.html">Checkout</a></li>
                                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                                <li><a href="faq.html">Terms &amp; Conditions &amp;</a></li>
                                                                <li><a href="faq.html">Redeem Voucher</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="footer__widget">
                                        <div class="footer__widget-title">
                                            <h4>Quick Links</h4>
                                        </div>
                                        <div class="footer__widget-content">
                                            <div class="footer__link">
                                                <ul>
                                                    <li><a href="contact.html">Store Location</a></li>
                                                    <li><a href="my-account.html">My account</a></li>
                                                    <li><a href="{{ route('order.tracking') }}">Order Tracking</a></li>
                                                    <li><a href="faq.html">FAQs</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div></div>
                                    </div><div class="col-xl-5 col-lg-6 col-md-6 col-sm-6">
                                        <div class="footer__widget">
                                            <div class="footer__widget-title mb-20">
                                                <h4>About The Store</h4>
                                            </div>
                                            <div class="footer__widget-content">
                                                <p class="footer-text mb-35">Our mission statement is to provide the absolute best customer experience available in the Electronic industry without exception.</p>
                                                <div class="footer__hotline d-flex align-items-center mb-10">
                                                    <div class="icon mr-15">
                                                        <i class="fal fa-headset"></i>
                                                    </div>
                                                    <div class="text">
                                                        <h4>Got Question? Call us 24/7!</h4>
                                                        <span><a href="tel:{{ setting()->number ?? "" }}">+{{ setting()->number ?? "" }}</a></span>
                                                    </div>
                                                </div>
                                                <div class="footer__info">
                                                    <ul>
                                                        <li>
                                                            <span>Add:  <a target="_blank" href="https://goo.gl/maps/c82DDZ8ALvL878Bv8">Walls Street 68, Mahattan, New York, USA</a></span>
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
            </div>
            <div class="footer__bottom">
                <div class="container">
                    <div class="footer__bottom-content pt-55 pb-45">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="footer__links text-center mb-25">
                                    <p>
                                        <a href="faq.html">Online Shopping</a>
                                        <a href="faq.html">Promotions</a>
                                        <a href="faq.html">My Orders</a>
                                        <a href="faq.html">Help</a>
                                        <a href="faq.html">Customer Service</a>
                                        <a href="faq.html">Support</a>
                                        <a href="faq.html">Most Populars</a>
                                        <a href="faq.html">New Arrivals</a>
                                        <a href="faq.html">Special Products </a>
                                        <a href="faq.html">Manufacturers</a>
                                        <br>
                                        <a href="faq.html">Garden Equipments</a>
                                        <a href="faq.html">Powers And Hand Tools </a>
                                        <a href="faq.html">Utensil &amp; Gadget </a>
                                        <a href="faq.html">Printers</a>
                                        <a href="faq.html">Projectors</a>
                                        <a href="faq.html">Scanners</a>
                                        <a href="faq.html">Store</a>
                                        <a href="faq.html">Business</a>
                                    </p>
                                </div>
                                <div class="payment-image text-center mb-25">
                                    <a href="contact.html"><img src="assets/img/payment/payment.png" alt=""></a>
                                </div>
                                <div class="copy-right-area text-center">
                                    <p>Copyright © <span>DukaMarket.</span> All Rights Reserved. Powered by <a href="#"><span class="main-color">Theme_Pure.</span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->
  @foreach(product() as $modal_product)
        <!-- shop modal start -->
        <div class="modal fade" id="productModalId{{ $modal_product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                <img src="{{asset('frontend')}}/assets/img/product/{{$modal_product->image}}" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav2" role="tabpanel" aria-labelledby="nav2-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="{{asset('frontend')}}/assets/img/quick-view/quick-view-2.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav3" role="tabpanel" aria-labelledby="nav3-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="{{asset('frontend')}}/assets/img/quick-view/quick-view-3.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav4" role="tabpanel" aria-labelledby="nav4-tab">
                                            <div class="product__modal-img w-img">
                                                <img src="{{asset('frontend')}}/assets/img/quick-view/quick-view-4.jpg" alt="">
                                            </div>
                                        </div>
                                        </div>
                                    <ul class="nav nav-tabs" id="modalTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="nav1-tab" data-bs-toggle="tab" data-bs-target="#nav1" type="button" role="tab" aria-controls="nav1" aria-selected="true">
                                                <img src="{{asset('frontend')}}/assets/img/product/{{ $modal_product->image }}" alt="" style="height: 85px;width:85px;">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav2-tab" data-bs-toggle="tab" data-bs-target="#nav2" type="button" role="tab" aria-controls="nav2" aria-selected="false">
                                            <img src="{{asset('frontend')}}/assets/img/quick-view/quick-nav-2.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav3-tab" data-bs-toggle="tab" data-bs-target="#nav3" type="button" role="tab" aria-controls="nav3" aria-selected="false">
                                            <img src="{{asset('frontend')}}/assets/img/quick-view/quick-nav-3.jpg" alt="">
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="nav4-tab" data-bs-toggle="tab" data-bs-target="#nav4" type="button" role="tab" aria-controls="nav4" aria-selected="false">
                                            <img src="{{asset('frontend')}}/assets/img/quick-view/quick-nav-4.jpg" alt="">
                                            </button>
                                        </li>
                                        </ul>
                                </div>
                            </div>
                            @php
                               $modal_product_rating=0;
                            @endphp
                            
                            @foreach($modal_product->orderitem->where('rstatus',1) as $orderitem)
                                @php
                                  $modal_product_rating+=$orderitem->review->rating;
                                @endphp
                            @endforeach
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product__modal-content">
                                    <h4><a href="product-details.html">{{ $modal_product->name }}</a></h4>
                                    <div class="product__review d-sm-flex">
                                        <div class="rating rating__shop mb-10 mr-30">
                                        <ul>
                                          @for($i=1;$i<=5;$i++)
                                            @if($i<=$modal_product_rating)
                                               <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            @else
                                               <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            @endif
                                          @endfor
                                            
                                      
                                        </ul>
                                        </div>
                                        <div class="product__add-review mb-15">
                                        <span>{{$modal_product->orderitem->where('rstatus',1)->count() }} review</span>
                                        </div>
                                    </div>
                                    <div class="product__price">
                                        <span>$ @if($modal_product->discount_price) {{$modal_product->discount_price}} - ${{$modal_product->price}} @else  {{$modal_product->price}} @endif </span>
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
                                        <span>{{$modal_product->quantity}} in stock</span>
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
                                                <span>{{$modal_product->sku}}</span></a>
                                            </li>
                                            <li><a href="#">
                                                <span class="cat mr-10">Categories:</span>
                                                <span>iPhone, Tablets</span></a>
                                            </li>
                                            <li><a href="#">
                                                <span class="tag mr-10">Tags:</span>
                                                <span>Smartphone Tablets</span></a>
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
     @endforeach
      <!-- JS here -->
      <script src="{{asset('frontend')}}/assets/js/vendor/jquery.js"></script>    
      <script src="{{asset('frontend')}}/assets/js/vendor/waypoints.js"></script>
      <script src="{{asset('frontend')}}/assets/js/bootstrap-bundle.js"></script>
      <script src="{{asset('frontend')}}/assets/js/meanmenu.js"></script>
      <script src="{{asset('frontend')}}/assets/js/swiper-bundle.js"></script>
      <script src="{{asset('frontend')}}/assets/js/tweenmax.js"></script>
      <script src="{{asset('frontend')}}/assets/js/owl-carousel.js"></script>
      <script src="{{asset('frontend')}}/assets/js/magnific-popup.js"></script>
      <script src="{{asset('frontend')}}/assets/js/parallax.js"></script>
      <script src="{{asset('frontend')}}/assets/js/backtotop.js"></script>
      <script src="{{asset('frontend')}}/assets/js/nice-select.js"></script>
      <script src="{{asset('frontend')}}/assets/js/countdown.min.js"></script>
      <script src="{{asset('frontend')}}/assets/js/counterup.js"></script>
      <script src="{{asset('frontend')}}/assets/js/wow.js"></script>
      <script src="{{asset('frontend')}}/assets/js/isotope-pkgd.js"></script>
      <script src="{{asset('frontend')}}/assets/js/imagesloaded-pkgd.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
      <script src="{{asset('frontend')}}/assets/js/ajax-form.js"></script>
      <script src="{{asset('frontend')}}/assets/js/main.js"></script>
      <script src="{{asset('frontend')}}/assets/js/shop.js"></script>
      <script src="{{asset('frontend')}}/assets/js/detail.js"></script>
      <script src="{{asset('frontend')}}/assets/js/checkout.js"></script>
      <script src="{{asset('frontend')}}/assets/js/wishlist.js"></script>
      <script src="{{asset('frontend')}}/assets/js/cart.js"></script>
      
      <script>
        @if(Session::has('success'))
          toastr.success("{{Session('success')}}");
        @endif
      </script>
     
     
    @stack('script')

    
   </body>

<!-- Mirrored from themepure.net/template/dukamarket/dukamarket/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Feb 2022 17:21:38 GMT -->
</html>
