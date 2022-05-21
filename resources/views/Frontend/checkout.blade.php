@extends('Frontend/layouts.base')
@section('main')

    <main>
        <!-- page-banner-area-start -->
        <div class="page-banner-area page-banner-height-2" data-background="{{asset('frontend')}}/assets/img/banner/page-banner-4.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-banner-content text-center">
                            <h4 class="breadcrumb-title">Checkout</h4>
                            <div class="breadcrumb-two">
                                <nav>
                                   <nav class="breadcrumb-trail breadcrumbs">
                                      <ul class="breadcrumb-menu">
                                         <li class="breadcrumb-trail">
                                            <a href="index.html"><span>Home</span></a>
                                         </li>
                                         <li class="trail-item">
                                            <span>Checkout</span>
                                         </li>
                                      </ul>
                                   </nav> 
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-banner-area-end -->

        <!-- coupon-area-start -->
  
        <section class="checkout-area pb-85">
            <div class="container">
                <form action="{{ route('store_checkout') }}" method="post">
                  @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="country-select">
                                            <label>Country <span class="required">*</span></label>
                                            <select style="display: none;" id="country" name="country">
                                                <option value="bangladesh">bangladesh</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Dominican">Dominican Republic</option>
                                            </select><div class="nice-select" tabindex="0"><span class="current">bangladesh</span><ul class="list"><li data-value="volvo" class="option selected">bangladesh</li><li data-value="saab" class="option">Algeria</li><li data-value="mercedes" class="option">Afghanistan</li><li data-value="audi" class="option">Ghana</li><li data-value="audi2" class="option">Albania</li><li data-value="audi3" class="option">Bahrain</li><li data-value="audi4" class="option">Colombia</li><li data-value="audi5" class="option">Dominican Republic</li></ul></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="required">*</span></label>
                                            <input type="text" @error('first_name') is-invalid @enderror id="first_name" placeholder="" name="first_name" required>
                                            <small id="first_name_error" class="form-text text-danger"></small>
                                            @error('first_name')<small class="form-text text-danger"> {{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input type="text" id="last_name" placeholder="" name="last_name" required>
                                            <small id="last_name_error" class="form-text text-danger"></small>
                                            @error('last_name')<small class="form-text text-danger"> {{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text" id="address" name="address" placeholder="Street address" required>
                                            <small id="address_error" class="form-text text-danger"></small>
                                            @error('address')<small class="form-text text-danger"> {{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" id="city" name="city" placeholder="Town / City" required>
                                            <small id="city_error" class="form-text text-danger"></small>
                                            @error('city')<small class="form-text text-danger"> {{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input type="text" id="zipcode" name="zipcode" placeholder="Postcode / Zip" required>
                                            <small id="zipcode_error" class="form-text text-danger"></small>
                                            @error('zipcode')<small class="form-text text-danger"> {{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input name="email" id="email" type="email" placeholder="email" required>
                                            <small id="email_error" class="form-text text-danger"></small>
                                            @error('email')<small class="form-text text-danger"> {{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" id="mobile" name="phone" placeholder="Phone" required>
                                            <small id="mobile_error" class="form-text text-danger"></small>
                                            @error('phone')<small class="form-text text-danger"> {{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="different-address">
                                    <div class="order-notes">
                                        <div class="checkout-form-list">
                                            <label>Order Notes</label>
                                            <textarea id="order_note" cols="30" rows="10" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="your-order mb-30 ">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($cart as $cartItem)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $cartItem->product->name }} <strong class="product-quantity"> × {{ $cartItem->quantity }}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">$165.00</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">${{$totals}}</span></td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Shipping</th>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <input type="radio" name="shipping">
                                                            <label>
                                                                Flat Rate: <span class="amount">$7.00</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" name="shipping">
                                                            <label>Free Shipping:</label>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                @if(Session::has('checkout'))
                                                <td><strong><span class="amount">${{ Session::get('checkout')['total']}}</span></strong>
                                                @else
                                                <td><strong><span class="amount">${{ $totals }}</span></strong>
                                                @endif
                                                
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="payment-method">
                                    <div class="mb-5">
                                      <select class="form-control payment" name="payment" id="payment">
                                        <option value="cod">Cash On Delivery</option>
                                        <option value="paypal">Paypal</option>
                                        <option value="razorpay">Razorpay</option>
                                        <option value="sslcommerz">SSLcommerz</option>
                                        <option value="stripe">Stripe</option>
                                      
                                      </select>
                                    </div><br><br>
                                </div>
                            </div>
                        </div>
                        <div class="stripe" style=display:none;>
                         @include('Frontend.stripe')
                        </div>
                        <button type="submit"class="btn btn-primary btn-lg sslcommerz" id=""style="display:none;">Pay sslcommerz
                        </button>
                        
                        <div class="order-button-payment mt-20">
                        <button type="submit" class="btn btn-warning btn-lg place_order">Place order</button>
                        </div>
                        <div class="order-button-payment mt-20">
                        <button type="button" class="btn btn-primary btn-lg  razorpay" style="display:none;">Pay Razorpay</button>
                        </div>
                        <div id="paypal-button-container" class="paypal" style="display:none;"></div>
                    </div>
                </form>
            </div>
        </section>
        <!-- checkout-area-end -->

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
@push('script')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AVHPLusmJMvUhLJSIySJf7Y5AwhZuGDMX0fH5KwpRLXUogEDWGZQE7c1rFR-BJi0JKH5pVrzO4bBCOrC&currency=USD"></script>


<script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                @if(Session::has('checkout'))
                   value:{{Session::get('checkout')['total']}}
                @else
                  value: {{$totals}}
                @endif
                 // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            var first_name=$('#first_name').val();
            var last_name=$('#last_name').val();
            var country=$('#country').val();
            var city=$('#city').val();
            var address=$('#address').val();
            var zipcode=$('#zipcode').val();
            var email=$('#email').val();
            var mobile=$('#mobile').val();
            var order_note=$('#order_note').val();
            var payment=$('#payment').val();
            var data={
              'first_name':first_name,
              'last_name':last_name,
              'country':country,
              'city':city,
              'address':address,
              'zipcode':zipcode,
              'email':email,
              'phone':mobile,
              'order_note':order_note,
              'payment':payment,
              'payment_id':transaction.id
           }
           $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
           });
           $.ajax({
             url:'/store/checkout',
             type:'post',
             data:data,
             success:function(data){
                 $(location).prop('href','/thank-you')
             }
           });
             
        
         });
        }
      }).render('#paypal-button-container');
    </script>

@endpush

@endsection

