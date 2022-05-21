 @push('style')
 	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
 
@endpush
  
<div class="container ">  
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                            <div class="col-md-12">
                                <div><p class="stripe-error py-3 text-danger"></p></div>
                            </div>
                            <div class="col-md-12 required">
                                <div class="form-group">
                                    <label class="control-label">Name on Card</label>
                                    <input type="text" name="card_name" class="form-control"  size="4">
                                </div>
                            </div>

                            <div class="col-md-12 required">
                                <div class="form-group">
                                    <label class="control-label">Card Number</label>
                                    <input type="number" name="card_number" autocomplete='off' class="form-control card-number" size="20">
                                </div>
                            </div>

                            <div class="col-md-4 required">
                                <div class="form-group">
                                    <label class='control-label'>CVC</label>
                                    <input type="number" name="cvc" @error('cvc') is-invalid  @enderror autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" size="4">
                                </div>
                            </div>
                            <div class="col-md-4 required">
                                <div class="form-group">
                                    <label class="control-label">Expiration Month</label>
                                    <input type="number" name="exp_month" class="form-control card-expiry-month"  placeholder="MM" size="2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class='control-label'>Expiration Year</label>
                                    <input type="number" name="exp_year"  class="form-control card-expiry-year"  placeholder="YYYY" size="4">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group d-none">
                                <div class="alert-danger alert">
                                    <h6 class="inp-error">Please correct the errors and try again.</h6>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Pay Now with Stripe</button>
                            </div>
                        </div>
                </div>
            </div>        
        </div>
    </div>
</div>
  

