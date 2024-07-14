
@extends('layouts.app')
@section('content')
 <!-- Page Banner Section Start -->
 <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/bg/bg-2.png') }}">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-banner text-center">
                    <h2>Wishlist</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->
<!--Wishlist section start-->
<div class="wishlist-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 ">
    <div class="container sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="row">

            <div class="col-12">
                <!-- Cart Table -->
                <div class="cart-table table-responsive mb-30">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-stock">Stock Status</th>
                                <th class="pro-addtocart">Add to cart</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('wishlist'))
                            @foreach(session('wishlist') as $productId => $quantity)
                            {{-- @dd($quantity) --}}
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img src="{{ asset($quantity['image']) }}" alt="Product"></a></td>
                                <td class="pro-title"><a href="#">{{ $quantity['name'] }}</a></td>
                                <td class="pro-price"><span>{{  $quantity['price']  }}</span></td>
                                <td class="pro-stock"><span class="in-stock">in stock</span></td>
                                <td class="pro-addtocart">
                                    <form action="{{ route('cart.add', $quantity['product_id']) }}" method="POST">
                                        @csrf
                                    <button type="submit" class="btn">Add to cart</button>
                                    </form>    
                                </td>
                                <td class="pro-remove">
                                    <form action="{{ route('wishlist.remove', $quantity['product_id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn product-btn"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<!--Wishlist section end-->

<!--NewsLetter section start-->
<div
    class="newsLetter-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="newsletter-wrapper">
                    <p class="small-text">Special Ofers For Subscribers</p>
                    <h3 class="title">Ten Percent Member Discount</h3>
                    <p class="short-desc">Subscribe to our newsletters now and stay up to date with new
                        collections, the latest lookbooks and exclusive offers.</p>

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