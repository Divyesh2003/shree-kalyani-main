@extends('layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
        use Illuminate\Support\Facades\Auth;
        $user = Auth::user();
    @endphp
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }

        .round-op {
            width: 75px;
            height: 75px;
            background: #FEF7ED;
            border-radius: 50%;
            text-align: center;
            line-height: 75px;
            font-size: 30px;
            font-weight: 700;
            color: #F0B153;
        }
    </style>
    <!-- Page Banner Section Start -->
    <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/bg/bg-2.png') }}">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-banner text-center">
                        <h2>{{ $product->name }}</h2>
                        <ul class="page-breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li>{{ $product->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->
    <!-- Single Product Section Start -->
    <div class="single-product-section section pb-100 pb-lg-80 pb-md-70 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop-area">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Product Details Left -->
                                <div class="product-details-left">
                                    <div class="product-details-images slider-lg-image-1 tf-element-carousel"
                                        data-slick-options='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "infinite": true,
                                    "asNavFor": ".slider-thumbs-1",
                                    "arrows": false,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                    }'>
                                        <div class="lg-image">
                                            <img src="{{ asset($product->image) }}" alt="">
                                            <a href="{{ asset($product->image) }}" class="popup-img venobox"
                                                data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                        </div>
                                        @php
                                            $gallery = json_decode($product->gallery, true);
                                        @endphp
                                        @foreach ($gallery as $asgallery)
                                            <div class="lg-image">
                                                <img src="{{ asset($asgallery) }}" alt="">
                                                <a href="{{ asset($asgallery) }}" class="popup-img venobox"
                                                    data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="product-details-thumbs slider-thumbs-1 tf-element-carousel"
                                        data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": true,
                                    "focusOnSelect": true,
                                    "asNavFor": ".slider-lg-image-1",
                                    "arrows": false,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                    }'
                                        data-slick-responsive='[
                                    {"breakpoint":991, "settings": {
                                        "slidesToShow": 3
                                    }},
                                    {"breakpoint":767, "settings": {
                                        "slidesToShow": 4
                                    }},
                                    {"breakpoint":479, "settings": {
                                        "slidesToShow": 2
                                    }}
                                ]'>
                                        <div class="sm-image"><img src="{{ asset($product->image) }}"
                                                alt="product image thumb"></div>
                                        @php
                                            $gallery = json_decode($product->gallery, true);
                                        @endphp
                                        @foreach ($gallery as $asgallery)
                                            <div class="lg-image">
                                                <img src="{{ asset($asgallery) }}" alt="">
                                                <a href="{{ asset($asgallery) }}" class="popup-img venobox"
                                                    data-gall="myGallery"><i class="fa fa-expand"></i></a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--Product Details Left -->
                            </div>
                            <div class="col-md-6">
                                <!--Product Details Content Start-->
                                <div class="product-details-content">
                                    <!--Product Nav Start-->
                                    <div class="product-nav">
                                        @if ($previousProduct)
                                            <a href="{{ route('product', $previousProduct->slug) }}"
                                                title="{{ $previousProduct->name }}"><i class="fa fa-angle-left"></i></a>
                                        @else
                                            <a href="#"><i class="fa fa-angle-left"></i></a>
                                        @endif
                                        @if ($nextProduct)
                                            <a href="{{ route('product', $nextProduct->slug) }}"
                                                title="{{ $nextProduct->name }}">
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        @else
                                            <a href="#" class="disabled"><i class="fa fa-angle-right"></i></a>
                                        @endif
                                    </div>
                                    @php
                                        $avg_rating = $reviews->avg('rating');
                                    @endphp
                                    <!--Product Nav End-->
                                    <h2> {{ $product->name }}</h2>
                                    <div class="single-product-reviews">
                                        {{-- <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star active"></i>
                                        <i class="fa fa-star-o"></i> --}}
                                        @while($avg_rating>0)
                                        @if($reviews->avg('rating') >0.5)
                                        <i class="fa fa-star active"></i>
                                        @else
                                        <i class="fa fa-star-o"></i>
                                        @endif
                                        @php $avg_rating--; @endphp
                                    @endwhile
                                        {{-- {{  number_format($reviews->avg('rating')$averageRating, 2) }} --}}
                                        <a class="review-link" href="#">({{ $reviews->count() }} customer review)</a>
                                    </div>
                                    <div class="single-product-price">
                                        <span class="price new-price">₹
                                            {{ $discount = ($product->price * $product->discount) / 100 }}</span>
                                        <span class="regular-price">{{ $product->price }}</span>
                                    </div>
                                    <div class="product-description">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="single-product-quantity">
                                        <form class="add-quantity" action="{{ route('cart.add', $product) }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="product-quantity">
                                                <input name="qty" type="number" value="1">
                                            </div>
                                            <div class="add-to-link">
                                                <button class="btn" type="submit"><i class="ion-bag"></i>add to
                                                    cart</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="wishlist-compare-btn d-flex">
                                        <form action="{{ route('wishlist.add', $product) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="wishlist-btn">Add to Wishlist</button>
                                        </form>
                                        <form action="{{ route('compare.add', $product) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="add-compare">Compare</button>
                                        </form>
                                    </div>
                                    <div class="product-meta">
                                        <span class="posted-in">
                                            Categories:
                                            <a
                                                href="{{ route('category', $product->category->slug) }}">{{ $product->category->name }}</a>
                                        </span>
                                    </div>
                                    <div class="single-product-sharing">
                                        <h3>Share this product</h3>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Product Details Content End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product Section End -->
    <!--Product Description Review Section Start-->
    <div class="product-description-review-section section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-review-tab section">
                        <!--Review And Description Tab Menu Start-->
                        <ul class="nav dec-and-review-menu">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#description">Description</a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#reviews">Reviews ({{ $reviews->count() }})</a>
                            </li>
                        </ul>
                        <div class="tab-content product-review-content-tab" id="myTabContent-4">
                            <div class="tab-pane fade active show" id="description">
                                <div class="single-product-description">
                                    <p>{{ $product->description }} </p>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p>Material Composition : {{ $product->material_composition }}</p>
                                            <p>Length : {{ $product->length }}</p>
                                            <p>Blouse : {{ $product->blouse }}</p>
                                            <p>Blouse Color : {{ $product->blouse_color }}</p>
                                            <p>Blouse Material : {{ $product->blouse_material }}</p>
                                            <p>Chuni : {{ $product->chuni }}</p>
                                            <p>Chuni Color : {{ $product->chuni_color }}</p>
                                            <p>Chuni Material : {{ $product->chuni_material }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p>Supplier Code : {{ $product->supplier_code }}</p>
                                            <p>Item Code : {{ $product->item_code }}</p>
                                            <p>HSN Code : {{ $product->hsn_code }}</p>
                                            <p>Image Code : {{ $product->image_code }}</p>
                                            <p>Design Code : {{ $product->design_code }}</p>
                                            <p>Febric : {{ $product->febric }}</p>
                                            <p>Base Color : {{ $product->base_color }}</p>
                                            <p>Compitation Color : {{ $product->compitation_color }}</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p>Chuni Work : {{ $product->chuni_work }}</p>
                                            <p>Decoration : {{ $product->decdoration }}</p>
                                            <p>Pattern : {{ $product->patterns }}</p>
                                            <p>Occasion Type: {{ $product->occasion_type }}</p>
                                            <p>Washing Instraction : {{ $product->washing_instruction }}</p>
                                            <p>Item Weight: {{ $product->item_weight }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @dd($reviews) --}}
                            <div class="tab-pane fade" id="reviews">
                                <div class="review-page-comment">
                                    <h2>{{ $reviews->count() }} review for {{ $product->name }}</h2>
                                    <ul>
                                        {{-- @dd() --}}
                                        @foreach($reviews as $review)
                                        <li>
                                            <div class="product-comment">
                                                <img src="{{ asset($review->user->image)}}" alt="">
                                                <div class="product-comment-content">
                                                    <div class="product-reviews">
                                                        {{ $stars = str_repeat('⭐', $review->rating) }}
                                                    </div>
                                                    <p class="meta">
                                                        <strong>{{ $review->user->firstname }} {{ $review->user->lastname }}</strong> - <span>{{ Carbon::parse($review->created_at)->format('F d, Y') }}</span>
                                                    <div class="description">
                                                        <p>{{ $review->message }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="review-form-wrapper">
                                        <div class="review-form">
                                            <span class="comment-reply-title">Add a review </span>
                                            <form action="{{ route('review') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf()
                                                @method('POST')
                                                <div class="input-element">
                                                    <div class="comment-form-rating">
                                                        <div class="rate">
                                                            <input type="radio" id="star5" class="rate"
                                                                name="rating" value="5" />
                                                            <label for="star5" title="text">5 stars</label>
                                                            <input type="radio" checked id="star4" class="rate"
                                                                name="rating" value="4" />
                                                            <label for="star4" title="text">4 stars</label>
                                                            <input type="radio" id="star3" class="rate"
                                                                name="rating" value="3" />
                                                            <label for="star3" title="text">3 stars</label>
                                                            <input type="radio" id="star2" class="rate"
                                                                name="rating" value="2">
                                                            <label for="star2" title="text">2 stars</label>
                                                            <input type="radio" id="star1" class="rate"
                                                                name="rating" value="1" />
                                                            <label for="star1" title="text">1 star</label>
                                                        </div>
                                                    </div>
                                                    <div class="comment-form-comment">
                                                        <textarea name="message" cols="40" rows="8"></textarea>
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $user ? $user->id : 'No user available' }}">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                    </div>
                                                    <div class="comment-submit">
                                                        @guest
                                                            <a href="{{ route('login') }}" class="form-button">Login</a>
                                                        @else
                                                            <button type="submit" class="form-button">Submit</button>
                                                        @endguest
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Review And Description Tab Content End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Product Description Review Section Start-->

    <!--Product section start-->
    <div
        class="product-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-95 pb-lg-75 pb-md-65 pb-sm-55 pb-xs-45">
        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="section-title st-border mb-20 pt-20">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="product-slider tf-element-carousel"
                data-slick-options='{
            "slidesToShow": 4,
            "slidesToScroll": 1,
            "infinite": true,
            "arrows": true,
            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
            }'
                data-slick-responsive='[
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
                @foreach ($relatedProducts as $product)
                    <div class="col">
                        <!--  Single Grid product Start -->
                        <div class="single-grid-product">
                            <div class="product-image">
                                <div class="product-label">
                                    <span class="sale">{{ $product->discount }}%</span>
                                    <span class="new">New</span>
                                </div>
                                <a href="{{ route('product', $product->slug) }}">
                                    <img src="{{ asset($product->image) }}" class="img-fluid" alt="">
                                    <img src="{{ asset($product->image) }}" class="img-fluid" alt="">
                                </a>

                                <div class="product-action d-flex justify-content-between">
                                    <a class="product-btn" href="cart.html">Add to Cart</a>
                                    <ul class="d-flex">
                                        <li>
                                            <form action="{{ route('wishlist.add', $product) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0"><i
                                                        class="ion-android-favorite-outline"></i></button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="{{ route('compare.add', $product) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0"><i
                                                        class="ion-ios-shuffle"></i></button>
                                            </form>
                                        </li>
                                        <li><a href="#quick-view-modal-container"class="quick-view-btn"
                                                data-bs-toggle="modal" data-product-id="{{ $product->id }}"
                                                title="Quick View"><i class="ion-ios-search-strong"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-category-rating">
                                    <span class="category"><a href="">{{ $product->category->name }}</a></span>
                                    <span class="rating">
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star active"></i>
                                        <i class="ion-android-star-outline"></i>
                                    </span>
                                </div>

                                <h3 class="title"> <a href="{{ route('product',$product->slug)}}">{{ $product->name }}</a></h3>
                                <p class="product-price"><span class="discounted-price">₹ {{ $product->price }}</span>
                                </p>
                                {{-- <div class="product-countdown" data-countdown="2020/06/01"></div> --}}
                            </div>
                        </div>
                        <!--  Single Grid product End -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--Product section end-->
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
                                <input type="email" name="email" name="email"
                                    placeholder="Enter Your Email Address Here..." required>
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
    <script>
        let stars = document.querySelectorAll('.star');
        let ratingInput = document.getElementById('rating_input');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                let value = star.getAttribute('data-value');
                ratingInput.value = value;

                stars.forEach(s => {
                    s.classList.remove('active');
                });

                star.classList.add('active');
            });
        });
    </script>
@endpush
