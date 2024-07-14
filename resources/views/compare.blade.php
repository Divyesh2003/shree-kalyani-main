
@extends('layouts.app')
@section('content')
 <!-- Page Banner Section Start -->
 <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/banners/bradcrumbs-1.png') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="page-banner text-center">
                    <h2>Compare</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Compare</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->
<!-- Compare Page Start -->
<div class="page-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
    <div class="container sb-border  pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="row">
            <div class="col-12">
                <form action="#">	
                    <!-- Compare Table -->
                    <div class="compare-table table-responsive">
                        @if(count($compare) > 0)
                        {{-- @dd($compare) --}}
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="first-column">Product</td>
                                    @foreach($compare as $item)
                                        <td class="product-image-title">
                                            <a href="#" class="image"><img src="{{ asset($item['image']) }}" alt="Compare Product" width="200px" height="300px"></a>
                                            <a href="#" class="title">{{ $item['name'] }}</a>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Description</td>
                                    @foreach($compare as $item)
                                        <td class="pro-desc"><p>{{ $item['description'] }}</p></td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Price</td>
                                    @foreach($compare as $item)
                                        <td class="pro-price">${{ $item['price'] }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Supplier Code</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['supplier_code'] }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Compitation Color</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['compitation_color'] }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Composition Color</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['material_composition'] }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Length</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['length'] }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Blouse</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['blouse'] }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Blouse Color</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['blouse_color'] }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Blouse Work</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['blouse_work'] }}</td>
                                    @endforeach
                                </tr>@auth
                                <tr>
                                    <td class="first-column">Pattern</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['patterns'] }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Item Weight</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['item_weight'] }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Blouse Material</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['blouse_material'] }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Supplier Code</td>
                                    @foreach($compare as $item)
                                        <td class="pro-color">{{ $item['supplier_code'] }}</td>
                                    @endforeach
                                </tr>
                                @endauth
                                <tr>
                                    <td class="first-column">Add to cart</td>
                                    @foreach($compare as $item)
                                        <td class="pro-addtocart">
                                            <form action="{{ route('cart.add', $item['product_id']) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                                            </form>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="first-column">Delete</td>
                                    @foreach($compare as $item)
                                        <td class="pro-remove">
                                            <form action="{{ route('compare.remove', $item['product_id']) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p>Your compare list is empty.</p>
                    @endif
                    </div>
                </form>	

            </div>
        </div>
    </div>
</div>
<!-- Compare Page End --> 
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