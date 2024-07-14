@extends('layouts.app')
@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/banners/bradcrumbs-1.png') }}">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-banner text-center">
                        <h2>Shipping Information</h2>
                        <ul class="page-breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li>Shipping Information</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 py-5">
                    <h3>Shipping Information </h3>
                    <p>After your order is confirmed, the product will be packed and dispatched for shipping through
                        transport. The L.R. number will be sent to your contact number and available in your account. With
                        the L.R. number, you can track your consignment.</p>
                </div>
            </div>
        </div>
    </section>
    <!--NewsLetter section start-->
    <div
        class="newsLetter-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter-wrapper">
                        <p class="small-text">Special Ofers For Subscribers</p>
                        <h3 class="title">Ten Percent Member Discount</h3>
                        <p class="short-desc">Subscribe to our newsletters now and stay up to date with new collections, the
                            latest lookbooks and exclusive offers.</p>
                        <div class="newsletter-form">
                            <form action="{{ route('suscribe') }}" method="post" class="mc-form">
                                @csrf()
                                @method('post')
                                <input type="email" name="email" placeholder="Enter Your Email Address Here..."
                                    required>
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
@push('scripts')
@endpush
