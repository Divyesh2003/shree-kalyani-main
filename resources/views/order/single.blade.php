@php
    use Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('content')
 <!-- Page Banner Section Start -->
 <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/bg/bg-2.png') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h2>Order</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>Order</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->

 <!--Order section start-->
 <div class="cart-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 ">
    <div class="container sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="row">

            <div class="col-12">
                <!-- Order Table -->
                <div class="cart-table table-responsive mb-30">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $orderitem)
                                    <tr>
                                        <td class="pro-thumbnail"><a
                                                href="{{ route('product', $orderitem->product->slug) }}"><img
                                                    src="{{ asset($orderitem->product->image) }}" alt="Product"></a></td>
                                        <td class="pro-title"><a
                                                href="{{ route('product', $orderitem->product->slug) }}">{{ $orderitem->product->name }}</a>
                                        </td>
                                        <td class="pro-price"><span>₹ {{ $orderitem->cost }} </span></td>
                                        <td class="pro-quantity">
                                            <div class="">{{ $orderitem->qty}} </div>
                                        </td>
                                        <td class="pro-subtotal"><span>₹
                                                {{ $orderitem->qty * $orderitem->cost }} </span></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3"></td>
                                        <td>{{ $order->total_qty }}</td>
                                        <td>{{ $order->total_value }}</td>
                                    </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12 mb-5">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cart section end-->
{{-- section shipment  --}}
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 my-4">
                <h3>Shippment Update</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Description</th>
                        <th scope="col">Location</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->shipment as $shipment)
                      <tr>
                        <th scope="row">{{ $shipment->date }}</th>
                        <td>{{ $shipment->time }}</td>
                        <td>{{ $shipment->description }}</td>
                        <td>{{ $shipment->location }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>  
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
                    <p class="short-desc">Subscribe to our newsletters now and stay up to date with new collections, the latest lookbooks and exclusive offers.</p>
                    <div class="newsletter-form">
                        <form action="{{ route('suscribe') }}" method="post" class="mc-form">
                            @csrf()
                            @method('post')
                            <input type="email" name="email" placeholder="Enter Your Email Address Here..." name="email" required>
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
<!-- Shop Section End -->
@endsection
@push('scripts')

@endpush