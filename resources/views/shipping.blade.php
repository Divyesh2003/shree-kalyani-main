@extends('layouts.app')
@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/banners/bradcrumbs-1.png') }}">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-banner text-center">
                        <h2>Shipping Policy</h2>
                        <ul class="page-breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li>Shipping Policy</li>
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
                  <h3>Shipping Policy </h3> 
                        <p>Consignment will be send through transport, and reached your nearby transport as per depends on distance within e-waybill validity. Consignment insure as per your choice of insurance accept and their policy. LR number will be sent on your mobile/ email.  </p>

                       <h3>Can I Exchange my order?</h3>
                       <p>This item is eligible for return. You can exchange this item for either damage (cut/stretched) or a different size/color or as per order.
                        Please keep the item in its original condition, with brand outer box, MRP tags attached, in manufacturer packaging for a successful refund/replacement.</p>

                        <h3>Can I change my order?</h3>
                        <p>If the item delivered to you is defective or different from what is mentioned on the product detail page or is missing some parts or accessories, it is eligible for a free replacement, however, only if an exact identical item is available from the same seller.</p>

                        <p>I need an exchange for the item for a different address.</p> 
                       <p> No, replacement cannot be delivered to another address. Only same address needed.</p>

                        <h3>What items can be returned?</h3>
                        <p>You can request a return for those items where returnable is mentioned.  
                            If product(s) are broken, defective, missing parts, or that differ from the description on the product detail page are eligible for return.</p>
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
@push('scripts')
   
@endpush
