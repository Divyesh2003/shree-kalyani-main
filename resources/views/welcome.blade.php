@extends('layouts.app')
@section('content')
  <!--slider section start-->
  <div class="hero-section section position-relative">
    <div class="tf-element-carousel slider-nav white-text_color" data-slick-options='{
        "slidesToShow": 1,
        "slidesToScroll": 1,
        "infinite": true,
        "arrows": false,
        "dots": true,
        "autoplay" : true,
        "fade" : true,
        "autoplaySpeed" : 7000,
        "pauseOnHover" : false,
        "pauseOnFocus" : false
        }' data-slick-responsive='[
        {"breakpoint":768, "settings": {
        "slidesToShow": 1
        }},
        {"breakpoint":575, "settings": {
        "slidesToShow": 1
        }}
        ]'>
        <!--Hero Item start-->
        <div class="hero-item bg-image image-height" data-bg="{{ asset('assets/images/hero/hero-8.webp') }}">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <!--Hero Content start-->
                        <div class="hero-content-2 left">

                            <h3>New Arrivals</h3>
                            <h1>New Saree <br> Collection <strong>Offer</strong></h1>
                            <a class="btn" href="">shop now</a>
                        </div>
                        <!--Hero Content end-->
                    </div>
                </div>
            </div>
        </div>
        <!--Hero Item end-->
        <!--Hero Item start-->
        <div class="hero-item bg-image image-height" data-bg="{{ asset('assets/images/hero/hero-9.jpeg') }}">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!--Hero Content start-->
                        <div class="hero-content-2 left">
                            <h3>New Arrivals</h3>
                            <h1>New Desire<br> Efforts <strong>Lengha</strong> </h1>
                            <a class="btn" href="">shop now</a>
                        </div>
                        <!--Hero Content end-->
                    </div>
                </div>
            </div>
        </div>
        <!--Hero Item end-->
    </div>
</div>
<!--slider section end-->
      <!--Banner section start-->
      <div class="banner-section section pt-30">
        <div
            class="container-fluid pl-20 pr-20 pl-lg-15 pr-lg-15 pl-md-15 pr-md-15 pl-sm-15 pr-sm-15 pl-xs-15 pr-xs-15">
            <div class="row">
                <div class="col-md-6 pb-xs-30">
                    <!-- Single Banner Start -->
                    <div class="single-banner-item">
                        <div class="banner-image">
                            <a href="{{ route('shop') }}">
                                <img src="{{ asset('assets/images/banners/h1-banner-1.png') }}" alt="">
                            </a>
                        </div>
                        <div class="banner-content banner-content-two">
                            <h4 class="title-light">BLACK FRIDAY</h4>
                            <h3 class="title">Save Up To 50% Off</h3>
                            <a href="{{ route('shop')}}">View Collection <i
                                    class="ion-android-arrow-dropright-circle"></i></a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                </div>
                <div class="col-md-6">
                    <!-- Single Banner Start -->
                    <div class="single-banner-item">
                        <div class="banner-image">
                            <a href="{{ route('shop')}}">
                                <img src="{{ asset('assets/images/banners/h1-banner-5.png') }}" alt="">
                            </a>
                        </div>
                        <div class="banner-content banner-content-two">
                            <h4 class="title-light">BEST SELLING !</h4>
                            <h3 class="title">Living Room Up To 70% Off</h3>
                            <a href="{{ route('shop') }}">View Collection <i
                                    class="ion-android-arrow-dropright-circle"></i></a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div>
        </div>
    </div>
    <!--Banner section end-->
       
<!--Feature section start-->
           <div class="feature-section feature-section-2 section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- Single Feature Start -->
                        <div class="single-feature">
                            <div class="feature-image">
                                <img src="{{ asset('assets/images/icons/free_shipping.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">SHIPPING</h4>
                               <a href="{{ route('shipping') }}"><p class="short-desc">Consignment will be send through transport, and reached your nearby transport as...</p></a> 
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- Single Feature Start -->
                        <div class="single-feature">
                            <div class="feature-image">
                                <img src="{{ asset('assets/images/icons/money_back.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Dilivery Info</h4>
                               <a href="{{ route('delivery.info') }}"> <p class="short-desc">Your order will be delivered within a week across India...</p></a>
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- Single Feature Start -->
                        <div class="single-feature pt-sm-30 last">
                            <div class="feature-image">
                                <img src="{{ asset('assets/images/icons/support247.webp') }}" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h4 class="title">Order Track</h4>
                               <a href="{{ route('account') }}"> <p class="short-desc">Your Order Shown Here...</p></a>
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                </div>
            </div>
        </div>
        <!--Feature section end-->
 
<!--Product section start-->
<div
class="product-section section pt-70 pt-lg-40 pt-md-30 pt-sm-20 pt-xs-30 pb-55 pb-lg-35 pb-md-25 pb-sm-15 pb-xs-5">
<div class="container">
    <div class="row">
        <div class="col">
            <div class="section-title text-center mb-30 pt-20">
                <h2>All Product</h2>
                <p>Browse the collection of our top rated products.</p>
            </div>
        </div>
    </div>
    <div class="product-slider tf-element-carousel normal-nav" data-slick-options='{
        "slidesToShow": 4,
        "slidesToScroll": 1,
        "infinite": true,
        "arrows": true,
        "rows" : 2,
        "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
        "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
        }' data-slick-responsive='[
        {"breakpoint":1199, "settings": {
        "slidesToShow": 3
        }},
        {"breakpoint":992, "settings": {
        "slidesToShow": 2
        }},
        {"breakpoint":768, "settings": {
        "slidesToShow": 2
        }},
        {"breakpoint":576, "settings": {
        "slidesToShow": 1,
        "arrows": false,
        "autoplay": true
        }}
        ]'>

        @foreach ($products as $product)
        {{-- @dd($product) --}}
        <div class="col">
            <!--  Single Grid product Start -->
            <div class="single-grid-product mb-40">
                <div class="product-image">
                    <div class="product-label">
                        <span class="sale">-{{ $product->discount }}%</span>
                        <span class="new">New</span>
                    </div>
                    <a href="{{ route('product',$product->slug)}}">
                        <img src="{{ asset($product->image) }}" class="" alt="" height="400px">
                        <img src="{{ asset($product->image) }}" class="" alt="" height="400px">
                    </a>

                    <div class="product-action d-flex justify-content-between">
                        <form action="{{ route('cart.add', $product) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn product-btn">Cart</button>
                        </form>
                        <ul class="d-flex">
                            <li>
                                <form action="{{ route('wishlist.add', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0"><i class="ion-android-favorite-outline"></i></button>
                                </form>
                                {{-- <a href="{{ route('wishlist.add', $product) }}"><i class="ion-android-favorite-outline"></i></a> --}}
                            </li>
                            <li>
                                <form action="{{ route('compare.add', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0"><i class="ion-ios-shuffle"></i></button>
                                </form>
                            <li><a href="#quick-view-modal-container" class="quick-view-btn" data-bs-toggle="modal"  data-product-id="{{ $product->id }}"
                                    title="Quick View"><i class="ion-ios-search-strong"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-content">
                    <div class="product-category-rating">
                        <span class="category"><a href="{{ route('shop') }}">{{ $product->name }}</a></span>
                        <span class="rating">
                            <i class="ion-android-star active"></i>
                            <i class="ion-android-star active"></i>
                            <i class="ion-android-star active"></i>
                            <i class="ion-android-star active"></i>
                            <i class="ion-android-star-outline"></i>
                        </span>
                    </div>

                    <h3 class="title"> <a href="{{ route('product',$product->slug)}}">{{ $product->description }}</a>
                    </h3>
                    <p class="product-price"><span class="discounted-price">₹ {{ $product->price }}</span></p>
                </div>
            </div>
            <!--  Single Grid product End -->
        </div>
        @endforeach
    </div>
<!--Banner section start-->
    <div class="banner-section section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Single Banner Start -->
                    <div class="single-banner-item mb-30">
                        <div class="banner-image">
                            <a href="{{ route('shop') }}">
                                <img src="{{ asset('assets/images/banners/eid-rts.webp') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                </div>
                <div class="col-md-6">
                    <!-- Single Banner Start -->
                    <div class="single-banner-item mb-30">
                        <div class="banner-image">
                            <a href="{{ route('shop') }}">
                                <img src="{{ asset('assets/images/banners/perfectly-plush-prints.webp') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div>
        </div>
    </div>
    <!--Banner section end-->

 <!-- List Product Section Start -->
 <div class="list-product-section section pt-80 pt-lg-60 pt-md-50 pt-sm-40 pt-xs-20">
    <div class="container sb-border  pb-75 pb-lg-55 pb-md-45 pb-sm-35 pb-xs-25">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <!--  Product List Widget Wrapper -->
                <div class="product-list-widget-wrapper">
                    <!-- widget product list title -->
                    <div class="list-product-section-title mb-35">
                        <h3><span>On Sale</span></h3>
                        <div class="on-sale-nav slick-btns"></div>
                    </div>
                    <!-- widget product list title -->

                    <!--  widget product list wrapper -->
                    <div class="widget-product-list-wrapper tf-element-carousel top-nav" data-slick-options='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "arrows": true,
                                "rows": 2,
                                "appendArrows": ".on-sale-nav",
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                "slidesToShow": 1
                                }},
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 1
                                }},
                                {"breakpoint":768, "settings": {
                                "slidesToShow": 1
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 1,
                                "arrows": false,
                                "autoplay": true
                                }}
                                ]'>
                                @foreach ($onsales as $onsale)
                                <!--  single widget product -->
                                <div class="single-grid-product list-mode">
                                    <div class="list-mode-image">
                                <a href="{{ route('product',$onsale->slug)}}">
                                    <img src="{{ asset($onsale->image) }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="list-mode-content">
                                <span class="category"><a href="{{ route('product',$onsale->slug)}}">{{ $onsale->name }}</a></span>
                                <h3 class="title"> <a href="{{ route('product',$onsale->slug)}}">{{ $onsale->description }}</a></h3>
                                <div class="product-category-rating">
                                    <span class="rating float-none">
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star-outline"></i>
                                    </span>
                                </div>
                                {{-- @dd($onsale->discount) --}}
                                <p class="product-price"><span class="discounted-price">₹ {{ is_numeric($onsale->price) && is_numeric($onsale->discount) ? ($onsale->price * $onsale->discount) / 100 : 'Invalid value' }} </span> <span
                                        class="main-price discounted">₹ {{ $onsale->price }}</span></p>
                            </div>
                        </div>
                        <!--  single widget product -->
                        @endforeach
                    </div>
                    <!-- End of widget product list wrapper -->
                </div>
                <!--  Product List Widget Wrapper -->
            </div>
            <div class="col-lg-4 col-md-6">
                <!--  Product List Widget Wrapper -->
                <div class="product-list-widget-wrapper">
                    <!-- widget product list title -->
                    <div class="list-product-section-title mb-35">
                        <h3><span>Latest Arrivals</span></h3>
                        <div class="latest-nav slick-btns"></div>
                    </div>
                    <!-- widget product list title -->
                    <!--  widget product list wrapper -->
                    <div class="widget-product-list-wrapper tf-element-carousel top-nav" data-slick-options='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "arrows": true,
                                "rows": 2,
                                "appendArrows": ".latest-nav",
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                "slidesToShow": 1
                                }},
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 1
                                }},
                                {"breakpoint":768, "settings": {
                                "slidesToShow": 1
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 1,
                                "arrows": false,
                                "autoplay": true
                                }}
                                ]'>
                                @foreach ($latestArraivals as $latestArraival)
                                    <!--  single widget product -->
                        <div class="single-grid-product list-mode">
                            <div class="list-mode-image">
                                <a href="{{ route('product',$latestArraival->slug)}}">
                                    <img src="{{ asset($latestArraival->image) }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="list-mode-content">
                                <span class="category"><a href="{{ route('product',$latestArraival->slug)}}">{{ $latestArraival->name }}</a></span>
                                <h3 class="title"> <a href="{{ route('product',$latestArraival->slug)}}">{{ $latestArraival->description }}</a>
                                </h3>
                                <div class="product-category-rating">
                                    <span class="rating float-none">
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star-outline"></i>
                                    </span>
                                </div>
                                {{-- <p class="product-price"><span class="discounted-price">₹ {{  $discount = ($latestArraival->price * $latestArraival->discount) / 100; }}</span> <span --}}
                                        class="main-price discounted">₹ {{ $latestArraival->price }}</span></p>
                            </div>
                        </div>
                        <!--  single widget product -->
                                @endforeach
                    </div>
                    <!-- End of widget product list wrapper -->
                </div>
                <!--  Product List Widget Wrapper -->
            </div>

            <div class="col-lg-4 col-md-6">
                <!--  Product List Widget Wrapper -->
                <div class="product-list-widget-wrapper">
                    <!-- widget product list title -->
                    <div class="list-product-section-title mb-35">
                        <h3><span>Top Rated Products</span></h3>
                        <div class="top-rated-nav slick-btns"></div>
                    </div>
                    <!-- widget product list title -->

                    <!--  widget product list wrapper -->
                    <div class="widget-product-list-wrapper tf-element-carousel top-nav" data-slick-options='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "infinite": true,
                                "arrows": true,
                                "rows": 2,
                                "appendArrows": ".top-rated-nav",
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                "slidesToShow": 1
                                }},
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 1
                                }},
                                {"breakpoint":768, "settings": { 
                                "slidesToShow": 1
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 1,
                                "arrows": false,
                                "autoplay": true
                                }}
                                ]'>
                    @foreach ($topRateds as $toprated)
                                     <!--  single widget product -->
                        <div class="single-grid-product list-mode">
                            <div class="list-mode-image">
                                <a href="{{ route('product',$toprated->slug)}}">
                                    <img src="{{ asset($toprated->image) }}" class="img-fluid" alt="">
                                </a><div class="">
                                    
                                </div>
                            </div>
                            <div class="list-mode-content">
                                <span class="category"><a href="{{ route('product',$toprated->slug)}}">{{ $toprated->category->name }}</a></span>
                                <h3 class="title"> <a href="{{ route('product',$toprated->slug)}}">{{ $toprated->description }}</a>
                                </h3>
                                <div class="product-category-rating">
                                    <span class="rating float-none">
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star-outline"></i>
                                    </span>
                                </div>
                                {{-- <p class="product-price"><span class="discounted-price">₹ {{ $discount = ($toprated->price * $toprated->discount) / 100; }}</span> <span --}}
                                        class="main-price discounted">₹ {{ $toprated->price }}</span></p>
                            </div>
                        </div>
                        <!--  single widget product -->
                    @endforeach
                    </div>
                    <!-- End of widget product list wrapper -->
                </div>
                <!--  Product List Widget Wrapper -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- List Product Section End -->
<!-- Testimonial Area Start -->
   <div class="testimonial-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-wrap bg-gray-two">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="testimonial-wrapper section-space--inner">
                                <div class="tf-element-carousel" data-slick-options='{
                                            "slidesToShow": 1,
                                            "slidesToScroll": 1,
                                            "infinite": true,
                                            "arrows": false,
                                            "dots": true
                                            }' data-slick-responsive='[
                                            {"breakpoint":768, "settings": {
                                            "slidesToShow": 1
                                            }},
                                            {"breakpoint":575, "settings": {
                                            "slidesToShow": 1
                                            }}
                                            ]'>
                                    <div class="item">
                                        <!-- single testimonial item Strat-->
                                        <div class="single-testimonial-item">
                                            <div class="testimonial-image">
                                                <img src="{{ asset('assets/images/testimonial/testimonial1.webp') }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <div class="testimonial-content">
                                                <p class="testimonial-text"> Sed vel urna at dui iaculis
                                                    gravida. Maecenas pretium, velit vitae placerat faucibus,
                                                    velit quam facilisis elit, sit amet lacinia est est id
                                                    ligula. Duis feugiat quam non justo faucibus, in gravida
                                                    diam tempor. Nam viverra enim non ipsum ornare, condimentum
                                                    blandit diam mattis. Maecenas gravida mol..</p>
                                                <img src="{{ asset('assets/images/icons/quote-icon.webp') }}" alt="">
                                                <p class="testimonial-author">Magdalena Valencia</p>
                                                <span class="post">Customer</span>
                                            </div>
                                        </div>
                                        <!-- single testimonial item End-->
                                    </div>
                                    <div class="item">
                                        <!-- single testimonial item Strat-->
                                        <div class="single-testimonial-item">
                                            <div class="testimonial-image">
                                                <img src="{{ asset('assets/images/testimonial/testimonial2.webp') }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <div class="testimonial-content">
                                                <p class="testimonial-text"> Sed vel urna at dui iaculis
                                                    gravida. Maecenas pretium, velit vitae placerat faucibus,
                                                    velit quam facilisis elit, sit amet lacinia est est id
                                                    ligula. Duis feugiat quam non justo faucibus, in gravida
                                                    diam tempor. Nam viverra enim non ipsum ornare, condimentum
                                                    blandit diam mattis. Maecenas gravida mol..</p>
                                                <img src="{{ asset('assets/images/icons/quote-icon.webp') }}" alt="">
                                                <p class="testimonial-author">Magdalena Valencia</p>
                                                <span class="post">Customer</span>
                                            </div>
                                        </div>
                                        <!-- single testimonial item Strat-->
                                    </div>
                                    <div class="item">
                                        <!-- single testimonial item Strat-->
                                        <div class="single-testimonial-item">
                                            <div class="testimonial-image">
                                                <img src="{{ asset('assets/images/testimonial/testimonial3.webp') }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <div class="testimonial-content">
                                                <p class="testimonial-text"> Sed vel urna at dui iaculis
                                                    gravida. Maecenas pretium, velit vitae placerat faucibus,
                                                    velit quam facilisis elit, sit amet lacinia est est id
                                                    ligula. Duis feugiat quam non justo faucibus, in gravida
                                                    diam tempor. Nam viverra enim non ipsum ornare, condimentum
                                                    blandit diam mattis. Maecenas gravida mol..</p>
                                                <img src="{{ asset('assets/images/icons/quote-icon.webp') }}" alt="">
                                                <p class="testimonial-author">Magdalena Valencia</p>
                                                <span class="post">Customer</span>

                                            </div>
                                        </div>
                                        <!-- single testimonial item Strat-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End -->

    <!--Blog section start-->
    <div class="blog-section section pt-50 pt-lg-30 pt-md-20 pt-sm-10 pt-xs-0">
        <div class="container sb-border  pb-80 pb-lg-60 pb-md-50 pb-sm-40 pb-xs-30">

            <div class="row">
                <!-- Section Title Start -->
                <div class="col">
                    <div class="section-title text-center mb-30 pt-20">
                        <h2>Post From Blogs</h2>
                        <p>Browse the collection of our new products.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
            <div class="blog-slider tf-element-carousel normal-nav" data-slick-options='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "infinite": true,
                "arrows": true,
                "dots": false,
                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                }' data-slick-responsive='[
                {"breakpoint":1199, "settings": {
                "slidesToShow": 3
                }},
                {"breakpoint":992, "settings": {
                "slidesToShow": 2
                }},
                {"breakpoint":768, "settings": {
                "slidesToShow": 2
                }},
                {"breakpoint":575, "settings": {
                "slidesToShow": 1,
                "arrows": false,
                "autoplay": true
                }}
                ]'>
                <?php  
                use Carbon\Carbon;
                
                ?>
                @foreach ($blogs as $blog)
                {{-- @dd($blog) --}}
                <!-- Single Blog Start -->
                <div class="blog col">
                    <div class="blog-inner">
                        <div class="media"><a href="{{ route('blog.single',$blog->slug) }}" class="image">
                            <img src="{{ asset($blog->image) }}" alt=""></a></div>
                        <div class="content">
                            <h3 class="title"><a href="{{ route('blog.single',$blog->slug) }}">{{ $blog->name }}</a></h3>
                            <ul class="meta">
                                <li>By <a href="#" tabindex="0">admin</a></li>
                                <li>{{ $blog->created_at->format('d M Y') }}</li>
                            </ul>
                            <a class="btn" href="{{ route('blog.single',$blog->slug) }}">Read more</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog End -->
                @endforeach
            </div>
        </div>
    </div>
    <!--Blog section end-->
    <!-- Modal -->
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
           $("#staticBackdrop").modal('show');
    });
</script>
@endpush