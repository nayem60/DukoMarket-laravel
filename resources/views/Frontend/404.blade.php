@extends('Frontend/layouts/base')

@section('main')
  <main>
        <!-- error-area-start -->
        <div class="error-area pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="error-info text-center">
                            <div class="error-image text-center mb-50">
                                <img src="{{asset('frontend')}}/assets/img/banner/404.png" alt="">
                            </div>
                            <div class="error-content">
                                <h5>Page Not Found</h5>
                                <div class="error-button">
                                    <a href="/" class="error-btn">Return to Homepage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- error-area-start -->



    </main>
@endsection