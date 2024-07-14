@php
     use App\Models\Cart;
     if(Auth::check()){
         $carts = Cart::where('user_id', Auth::user()->id)->get();
     }
@endphp
@extends('layouts.app')
@section('content')
 <!-- Page Banner Section Start -->
 <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/banners/bradcrumbs-1.png') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h2>Checkout</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->
<!--Checkout section start-->
<div class="checkout-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 ">
    <div class="container sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="row">
            <div class="col-12">
     <!-- Checkout Form Start-->
        <form action="{{ route('order.store') }}" class="checkout-form" method="post">
            @csrf()
            @method('POST')
                <div class="row row-40">
                    <div class="col-lg-7">
                        <!-- Billing Address -->
                        <div id="billing-form" class="mb-10">
                            <h4 class="checkout-title">Billing Address</h4>
                            <input type="hidden" placeholder="" name="user_id" value="{{ $user->id }}" >
                            <div class="row">
                                <div class="col-md-6 col-12 mb-20">
                                    <label>First Name*</label>
                                    <input type="text" placeholder="First Name" name="first_name" value="{{ $user->firstname }}" >
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Last Name*</label>
                                    <input type="text" placeholder="Last Name" name="last_name" value="{{ $user->lastname }}" >
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Email Address*</label>
                                    <input type="email" placeholder="Email Address" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Phone no*</label>
                                    <input type="text" placeholder="Phone number" name="phone" value="{{ $user->mobile }}">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Company Name</label>
                                    <input type="text" placeholder="Company Name" name="company_name" value="{{ $user->company_name }}">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Address*</label>
                                    <input type="text" placeholder="Address line 1" name="address_1" value="{{ $user->addaress_1 }}">
                                    <input type="text" placeholder="Address line 2" name="address_2" value="{{ $user->addaress_2 }}">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Country*</label>
                                    <select class="" name="country" id="country">
                                        @foreach ($coutries as $country)
                                            <option value="{{$country->id}}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>State*</label>
                                    <select class="form-select" name="state" id="state">
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}">{{ $state->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Town/City*</label>
                                    <input type="text" placeholder="Town/City" name="city">
                                </div>
                                
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Zip Code*</label>
                                    <input type="text" placeholder="Zip Code" name="pincode" value="{{ $user->pincode }}">
                                </div>
                                <div class="col-12 mb-20">
                                    <div class="check-box"> 
                                        <input type="checkbox" id="create_account">
                                        <label for="create_account">Create an Acount?</label>
                                    </div>
                                    <div class="check-box">
                                        <input type="checkbox" id="shiping_address" data-shipping>
                                        <label for="shiping_address">Ship to Different Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Shipping Address -->
                        <div id="shipping-form">
                            <h4 class="checkout-title">Shipping Address</h4>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-20">
                                    <label>First Name*</label>
                                    <input type="text" placeholder="First Name" name="shipping_first_name">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Last Name*</label>
                                    <input type="text" placeholder="Last Name" name="shipping_last_name">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Email Address*</label>
                                    <input type="email" placeholder="Email Address" name="shipping_email">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Phone no*</label>
                                    <input type="text" placeholder="Phone number" name="shipping_phone">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Company Name</label>
                                    <input type="text" placeholder="Company Name" name="shipping_company">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Address*</label>
                                    <input type="text" placeholder="Address line 1" name="shipping_address_1">
                                    <input type="text" placeholder="Address line 2" name="shipping_address_2">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Country*</label>
                                    <select class="" name="shipping_country">
                                        @foreach ($coutries as $country)
                                            <option value="{{$country->id}}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Town/City*</label>
                                    <input type="text" placeholder="Town/City" name="shipping_city">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>State*</label>
                                    <input type="text" placeholder="State" name="shipping_state">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Zip Code*</label>
                                    <input type="text" placeholder="Zip Code" name="shipping_pincode">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <!-- Cart Total -->
                            <div class="col-12 mb-60">
                                <h4 class="checkout-title">Cart Total</h4>
                                <div class="checkout-cart-total">
                                    <h4>Product <span>Total</span></h4>
                                 @guest
                                    @if (session('cart'))
                                    <ul>
                                        @foreach (session('cart') as $productId => $quantity)
                                        @dd($quantity)
                                        <li>{{ $quantity['name'] }} X {{ $quantity['quantity'] }} <span>₹ {{ $quantity['price'] }}</span></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    {{-- <p>Sub Total <span>$296.00</span></p>
                                    <p>Shipping Fee <span>$00.00</span></p>
                                    <h4>Grand Total <span>$296.00</span></h4> --}}
                                @else
                                @if($carts)
                                @php
                                $cartTotal = 0; // Initialize the total cart value
                                $totalProductCount = 0;
                            @endphp
                                <ul>
                                    @foreach ($carts as $productId => $quantity)
                                    @php
                                    $total = $quantity['quantity'] * $quantity['price'];
                                    $cartTotal += $total; // Add the total of each item to the cart total
                                    $totalProductCount += $quantity['quantity']; // Add the quantity to the total product count
                                @endphp
                                    <li>{{ $quantity['name'] }} X {{ $quantity['quantity'] }} <span>₹ {{ $quantity['price'] }}</span></li>
                                    @endforeach
                                </ul>
                                @endif
                                {{-- <p>Sub Total <span>$296.00</span></p> --}}
                                {{-- <p>Shipping Fee <span>$00.00</span></p> --}}
                                <h4>Grand Total <span>₹ {{ $cartTotal }}</span></h4>
                                    @endguest
                                </div>
                            </div>
                            <!-- Payment Method -->
                            <div class="col-12 mb-30">
                                <h4 class="checkout-title">Payment Method</h4>
                                <div class="checkout-payment-method">
                                    <div class="single-method">
                                        <input type="radio" id="payment_check" name="payment-method" value="check">
                                        <label for="payment_check">Check Payment</label>
                                        <p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                    </div>
                                    <div class="single-method">
                                        <input type="radio" id="payment_bank" name="payment-method" value="bank">
                                        <label for="payment_bank">Direct Bank Transfer</label>
                                        <p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                    </div>
                                    <div class="single-method">
                                        <input type="radio" id="payment_cash" name="payment-method" value="cash">
                                        <label for="payment_cash">Cash on Delivery</label>
                                        <p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                    </div>
                                    <div class="single-method">
                                        <input type="radio" id="payment_paypal" name="payment-method" value="paypal">
                                        <label for="payment_paypal">Paypal</label>
                                        <p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                    </div>
                                    <div class="single-method">
                                        <input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
                                        <label for="payment_payoneer">Payoneer</label>
                                        <p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                    </div>
                                    <div class="single-method">
                                        <input type="checkbox" id="accept_terms">
                                        <label for="accept_terms">I’ve read and accept the terms & conditions</label>
                                    </div>
                                </div>
                                <button class="place-order btn btn-lg btn-round">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form> 
            </div>
        </div>            
    </div>
</div>
<!--Checkout section end-->

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
@push('scripts')
@endpush