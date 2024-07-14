@extends('layouts.app')
@section('content')
        <!-- Page Banner Section Start -->
        <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/bg/bg-4.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col">
                        
                        <div class="page-banner text-center">
                            <h2>Login Register</h2>
                            <ul class="page-breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li>Login Register</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <!--Login Register section start-->
        <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
            <div class="container sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
                <div class="row">
                        <!--Login Form Start-->
                        <div class="col-md-6 col-sm-6">
                            <div class="customer-login-register">
                                <div class="form-login-title">
                                    <h2>Login</h2>
                                </div>
                                <div class="login-form">
                                    <form action="{{ route('login.post') }}" method="POST">
                                        @csrf()
                                        @method("POST")
                                        <div class="form-fild">
                                            <p><label>Username or email address <span class="required">*</span></label></p>
                                            <input name="email" value="" type="text">
                                        </div>
                                        <div class="form-fild">
                                            <p><label>Password <span class="required">*</span></label></p>
                                            <input name="password" value="" type="password">
                                        </div>
                                        <div class="login-submit">
                                            <button type="submit" class="btn">Login</button>
                                            <label>
                                                <input class="checkbox" name="rememberme" value="" type="checkbox">
                                                <span>Remember me</span>
                                            </label>
                                        </div>
                                        <div class="lost-password">
                                            <a href="#">Lost your password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Login Form End-->
                        <!--Register Form Start-->
                        <div class="col-md-6 col-sm-6">
                    
                        </div>
                        <!--Register Form End-->
                    </div>            
            </div>
        </div>
        <!--Login Register section end-->

        <!--NewsLetter section start-->
        <div
            class="newsLetter-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="newsletter-wrapper">
                            <p class="small-text">Special Ofers For Subscribers</p>
                            <h3 class="title">Ten Percent Member Discount</h3>
                            <p class="short-desc">Subscribe to our newsletters now and stay up to date with new collections, the latest lookbooks and exclusive offers.</p>
    
                            <div class="newsletter-form">
                                <form action="{{ route('suscribe') }}" method="post" class="mc-form">
                                    @csrf()
                                    @method('post')
                                    <input type="email" name="email" placeholder="Enter Your Email Address Here..." required>
                                    <button type="submit" value="submit">SUBSCRIBE!</button>
                                </form>
                            </div>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--NewsLetter section end-->
@endsection