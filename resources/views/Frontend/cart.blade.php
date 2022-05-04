@extends('Frontend/layouts.base')
@section('main')

  
    
    <main >
       
        <!-- cart-area-start -->
        <section class="cart-area pt-120 pb-120 " >
            <div class="container-fluid ">
               <div class="row ">
                  <div class="col-12 reload">
                        <form action="">
                           <div class="table-content table-responsive ">
                              <table class="table">
                                    <thead>
                                       <tr>
                                          <th class="product-thumbnail">Images</th>
                                          <th class="cart-product-name">Product</th>
                                         <th class="cart-product-name">Variant</th>
                                          <th class="product-price">Unit Price</th>
                                          <th class="product-quantity">Quantity</th>
                                          <th class="product-subtotal">Total</th>
                                          <th class="product-remove">Remove</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($cart as $carts)
                                       <tr>
                                          <td class="product-thumbnail"><a href="shop-details.html"><img src="{{ asset('frontend') }}/assets/img/product/{{ $carts->product->image }}" alt=""></a></td>
                                          <td class="product-name"><a href="shop-details.html">{{ $carts->product->name }}</a></td>
                                          <td class="product-name"><a href="shop-details.html">
                                          @if(isset($carts->variant_id)) 
                                             @if($carts->variant->color && $carts->variant->size)
                                                color:{{ $carts->variant->color->name}}
                                                size:{{ $carts->variant->size->name }}
                                             @elseif($carts->variant->color)
                                                color:{{ $carts->variant->color->name }}
                                             @else
                                                size:{{ $carts->variant->size->name }}
                                             @endif
                  
                                          @endif 
                                            </a></td>
                                          <td class="product-price"><span class="amount">$
                                          @if($carts->variant)
                                              V-{{ $carts->variant->price }}
                                          @elseif($carts->product->discount_price)
                                               D-{{ $carts->product->discount_price }}
                                          @else
                                               R-{{ $carts->product->price }} 
                                          @endif
                                          </span></td>
                                          <td class="product-quantity">
                                          <div class="cart-plus-minus"><input type="text" value="{{ $carts->quantity }}"><div class="dec qtybutton" onclick="dec({{ $carts->id }})">-</div><div class="inc qtybutton" onclick="inc({{ $carts->id }})">+</div></div>
                                          </td>
                                          <td class="product-subtotal"><span class="amount">$
                                          @if($carts->variant)
                                              V-{{ $carts->variant->price*$carts->quantity }}
                                          @elseif($carts->product->discount_price*$carts->quantity)
                                               D-{{ $carts->product->discount_price * $carts->quantity }}
                                          @else
                                               R-{{ $carts->product->price*$carts->quantity}} 
                                          @endif
                                          </span></td>
                                          <td class="product-remove"><a href="javascript:void(0)" onclick="remove({{ $carts->id }})"><i class="fa fa-times"></i></a></td>
                                       </tr>
                                       @endforeach
                                   
                                    </tbody>
                              </table>
                           </div>
                           <div class="row">
                              <div class="col-12">
                                    <div class="coupon-all">
                                      @if(Session::has('coupon_error'))
                                         <p>{{ Session::get('coupon_error') }}</p>
                                      @endif
                                     @if(!Session::has('coupon'))
                                      <form action="">
                                       <div class="coupon">
                                          <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                          <button class="tp-btn-h1"  type="submit">Apply
                                                coupon</button>
                                       </div>
                                       </form>
                                      @endif 
                                       <div class="coupon2">
                                          <button class="tp-btn-h1" name="update_cart" type="submit">Update cart</button>
                                       </div>
                                    </div>
                              </div>
                           </div>
                           <div class="row justify-content-end">
                              <div class="col-md-5">
                                    <div class="cart-page-total">
                                       <h2>Cart totals</h2>
                                       <ul class="mb-20">
                                          <li>Subtotal <span>${{ number_format($totals,2,'.','')}}</span></li>
                                          @if(Session::has('coupon'))
                                           <li>Discount<span>${{ $discount }} <a href="{{ route('coupons') }}" style="font-size:25px; color:red;">×</a></span></li>
                                           <li>Total <span>${{ $subtotal }}</span></li>
                                          @else
                                          <li>Total <span>${{ number_format($totals,2,'.','') }}</span></li>
                                          @endif
                                       </ul>
                                       <a class="tp-btn-h1" href="{{ route('checkout') }}">Proceed to checkout</a>
                                    </div>
                              </div>
                           </div>
                        </form>
                  </div>
               </div>
            </div>
         </section>
         <!-- cart-area-end -->

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
                                <form action="">
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
@push('script')
<script>
  function dec(id){
     $.ajax({
       url:"dec/cart/"+id,
       type:'get',
       success:function(data){
         $(".reload").load(location.href + " .reload");
       }
     });
  }
  
  function inc(id){
    $.ajax({
      url:"inc/cart/"+id,
      type:'get',
      success:function(){
         $(".reload").load(location.href + " .reload");
          
      }
    });
  }
  
  function remove(id){
    $.ajax({
      url:"remove/cart/"+id,
      type:'get',
      success:function(data){
        $(".reload-cart").load(location.href + " .reload-cart");
        $(".reload").load(location.href + " .reload");
          
      }
    });
  }
  
</script>

@endpush

@endsection