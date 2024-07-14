@php
    use Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('content')
    <!-- Page Banner Section Start -->
    <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/banners/bradcrumbs-1.png') }}">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-banner text-center">
                        <h2>Shopping Cart</h2>
                        <ul class="page-breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->

    <!--Cart section start-->
    <div class="cart-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 ">
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
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cartTotal = 0; // Initialize the total cart value
                                    $totalProductCount = 0;
                                @endphp
                             @guest
                                @if (session('cart'))
                                    @foreach (session('cart') as $productId => $quantity)
                                        @php
                                            $total = $quantity['quantity'] * $quantity['price'];
                                            $cartTotal += $total; // Add the total of each item to the cart total
                                            $totalProductCount += $quantity['quantity']; // Add the quantity to the total product count
                                        @endphp
                                        <tr>
                                            <td class="pro-thumbnail"><a
                                                    href="{{ route('product', $quantity['slug']) }}"><img
                                                        src="{{ asset($quantity['image']) }}" alt="Product"></a></td>
                                            <td class="pro-title"><a
                                                    href="{{ route('product', $quantity['slug']) }}">{{ $quantity['name'] }}</a>
                                            </td>
                                            <td class="pro-price"><span>₹ {{ $quantity['price'] }}</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input name="qty-number" type="number"
                                                        class="qty-number" data-product-id="{{ $quantity['product_id'] }}"
                                                        value="{{ $quantity['quantity'] }}"></div>
                                            </td>
                                            <td class="pro-subtotal"><span>₹
                                                    {{ $quantity['quantity'] * $quantity['price'] }} </span></td>
                                            <td class="pro-remove">
                                                <form action="{{ route('cart.remove') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $productId }}">
                                                    <button type="submit" class="btn-delete"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>
                                            <p>Your cart is empty.</p>
                                        </td>
                                    </tr>
                                @endif
                                @else
                                @if ($carts->isNotEmpty())
                                @foreach ($carts as $productId => $quantity)
                                    @php
                                        $total = $quantity['quantity'] * $quantity['price'];
                                        $cartTotal += $total; // Add the total of each item to the cart total
                                        $totalProductCount += $quantity['quantity']; // Add the quantity to the total product count
                                    @endphp
                                    <tr>
                                        <td class="pro-thumbnail"><a
                                                href="{{ route('product', $quantity['slug']) }}"><img
                                                    src="{{ asset($quantity['image']) }}" alt="Product"></a></td>
                                        <td class="pro-title"><a
                                                href="{{ route('product', $quantity['slug']) }}">{{ $quantity['name'] }}</a>
                                        </td>
                                        <td class="pro-price"><span>₹ {{ $quantity['price'] }}</span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty"><input name="qty-number" type="number"
                                                    class="qty-number" data-product-id="{{ $quantity['product_id'] }}"
                                                    value="{{ $quantity['quantity'] }}"></div>
                                        </td>
                                        <td class="pro-subtotal"><span>₹
                                                {{ $quantity['quantity'] * $quantity['price'] }} </span></td>
                                        <td class="pro-remove">
                                            <form action="{{ route('cart.remove') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $productId }}">
                                                <button type="submit" class="btn-delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <p>Your cart is empty.</p>
                                    </td>
                                </tr>
                            @endif
                                @endguest
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-5">
                        </div>
                        <!-- Cart Summary -->
                        <div class="col-lg-6 col-12 mb-30 d-flex">
                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <h4>Cart Summary</h4>
                                    {{-- <p>Sub Total <span>$75.00</span></p> --}}
                                    {{-- <p>Shipping Cost <span>$00.00</span></p> --}}
                                    <h2>Grand Total <span>₹ {{ $cartTotal }}</span></h2>
                                </div>
                                <div class="cart-summary-button">
                                    {{-- <button class="btn">Checkout</button> --}}
                                    <a href="{{ route('checkout')}}" class="btn">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cart section end-->
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.qtybtn').on('click', function() {
                var productId = $(this).closest('.pro-qty').find('.qty-number').data('product-id');
                var qty = $(this).closest('.pro-qty').find('.qty-number').val();
                $.ajax({
                    url: 'cart/add/' + productId, // Ensure the correct route is being used
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        qty: qty
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload(); // Refresh the page to reflect changes
                        } else {
                            location.reload(); // Refresh the page to reflect changes
                            // console.error('Error updating quantity:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error
                        console.error('AJAX error:', error);
                    }
                });
            });
        });
    </script>
@endpush
