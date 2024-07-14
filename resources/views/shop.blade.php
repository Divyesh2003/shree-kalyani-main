@extends('layouts.app')
@section('content')
<!-- Page Banner Section Start -->
<div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/bg/bg-2.png') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h2>Shop</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->
<!-- Shop Section Start -->
<div class="shop-section section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shop-area sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-60 pb-xs-50">
                    <div class="row">
                        <div class="col-12">
                            <!-- Grid & List View Start -->
                            <div class="shop-topbar-wrapper d-flex justify-content-between align-items-center">
                                <div class="grid-list-option d-flex">
                                        <ul class="nav">
                                        <li>
                                        <a class="active show" data-bs-toggle="tab" href="#grid"><i class="fa fa-th"></i></a>
                                        </li>
                                        <li>
                                        </li>
                                    </ul>
                                    <p>Showing {{ $products->total()}} results</p>
                                    </div>
                                    <!--Toolbar Short Area Start-->
                                    <div class="toolbar-short-area d-md-flex align-items-center">
                                        <div class="toolbar-shorter ">
                                        <label>Sort By:</label>
                                        <form method="GET" action="{{ route('shop') }}" id="sortForm">
                                            <select name="sort_by" class="wide" onchange="document.getElementById('sortForm').submit()">
                                                <option value="relevance" data-display="Select" {{ request('sort_by') == 'relevance' ? 'selected' : '' }}>Relevance</option>
                                                <option value="Name, A to Z" {{ request('sort_by') == 'Name, A to Z' ? 'selected' : '' }}>Name, A to Z</option>
                                                <option value="Name, Z to A" {{ request('sort_by') == 'Name, Z to A' ? 'selected' : '' }}>Name, Z to A</option>
                                                <option value="Price, low to high" {{ request('sort_by') == 'Price, low to high' ? 'selected' : '' }}>Price, low to high</option>
                                                <option value="Price, high to low" {{ request('sort_by') == 'Price, high to low' ? 'selected' : '' }}>Price, high to low</option>
                                            </select>
                                        </form>
                                        </div>
                                    </div>
                                    <!--Toolbar Short Area End-->
                            </div>
                            <!-- Grid & List View End -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 order-lg-1 order-2">
                        <div class="col-lg-12 order-lg-2 order-1">
                            <div class="row">
                                <div class="col-lg-3 order-lg-1 order-2">
                                    <!-- Single Sidebar Start  -->
                                    <div class="common-sidebar-widget">
                                        <h3 class="sidebar-title">Product categories</h3>
                                        <ul class="sidebar-list">
                                            @foreach ($categories as $category)
                                            <li><a href="{{ route('category',$category->slug) }}"><i class="ion-plus"></i>{{ $category->name }} <span class="count">({{ $category->products_count }})</span></a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- Single Sidebar End  -->
                                    <!-- Single Sidebar Start  -->
                                    <div class="common-sidebar-widget">
                                        <h3 class="sidebar-title">Filter by price</h3>
                                        <div class="sidebar-price">
                                            <form method="GET" action="{{ route('shop') }}" id="sortForm">
                                            {{-- <div id="price-range" class="mb-20"></div> --}}
                                            <label for="min_price">Min Price:</label>
                                            <input type="number" class="form-control" name="min_price" id="min_price" value="{{ request('min_price') }}">
                                            <label for="max_price">Max Price:</label>
                                            <input type="number" class="form-control mt-3" name="max_price" id="max_price" value="{{ request('max_price') }}">
                                            <button type="submit" class="btn mt-3">Filter</button>
                                        </form>
                                        </div>
                                    </div>
                                    <!-- Single Sidebar End  -->
                                    <!-- Single Sidebar Start  -->
                                    <div class="common-sidebar-widget">
                                        <h3 class="sidebar-title">Compare Products</h3>
                                        <div class="compare-products-list">
                                            <ul>
                                                @foreach ($compares as $compare)
                                                {{-- @dd($compare) --}}
                                                <li class="d-flex align-items-center">
                                                    <a href="{{ route('product',$compare['slug'])}}" class="title">{{ $compare['name'] }} </a>
                                            <form action="{{ route('compare.remove', $compare['product_id']) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn ms-5"><i class="fa fa-close"></i></button>
                                            </form>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <a href="{{ route('compare.clear') }}" class="clear-btn">Clear all</a>
                                            <a type="button" href="{{ route('compare.index') }}" class="btn compare-btn">Compare</a>
                                        </div>
                                    </div>
                                    <!-- Single Sidebar End  -->
                                </div>
                                <div class="col-lg-9 order-lg-2 order-1">
                                    <div class="shop-product">
                                        <div id="myTabContent-2" class="tab-content">
                                            <div id="grid" class="tab-pane fade active show">
                                                <div class="product-grid-view">
                                                    <div class="row">
                                                        @foreach($products as $product)
                                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                                            <!--  Single Grid product Start -->
                                                            <div class="single-grid-product mb-30">
                                                                <div class="product-image">
                                                                    <div class="product-label">
                                                                        <span class="sale">{{ $product->discount }}%</span>
                                                                        <span class="new">New</span>
                                                                    </div>
                                                                    <a href="{{ route('product',$product->slug)}}">
                                                                        <img src="{{ asset($product->image) }}" class="img-fluid" alt="">
                                                                        <img src="{{ asset($product->image) }}" class="img-fluid" alt="">
                                                                    </a>
                                                                    <div class="product-action d-flex justify-content-between">
                                                                        <form action="{{ route('cart.add', $product) }}" method="POST">
                                                                        @csrf
                                                                            <button type="submit" class="btn product-btn">Add to Cart</button>
                                                                        </form>
                                                                        {{-- <a class="product-btn" href="#" onclick="addToCart({{ $product->id }})">Add to Cart</a> --}}
                                                                        <ul class="d-flex">
                                                                            <li>
                                                                                <form action="{{ route('wishlist.add', $product) }}" method="POST">
                                                                                    @csrf
                                                                                    <button type="submit" class="btn btn-link p-0"><i class="ion-android-favorite-outline"></i></button>
                                                                                </form>
                                                                            </li>
                                                                            <li>
                                                                                <form action="{{ route('compare.add', $product) }}" method="POST">
                                                                                    @csrf
                                                                                    <button type="submit" class="btn btn-link p-0"><i class="ion-ios-shuffle"></i></button>
                                                                                </form>
                                                                            </li>
                                                                            <li><a href="#quick-view-modal-container"  class="quick-view-btn" data-bs-toggle="modal" data-product-id="{{ $product->id }}" title="Quick View"><i class="ion-ios-search-strong"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-content">
                                                                    <div class="product-category-rating">
                                                                        <span class="category"><a href="{{ route('category',$product->category->slug) }}">{{ $product->category->name }}</a></span>
                                                                        <span class="rating">
                                                                        <i class="ion-android-star active"></i>
                                                                        <i class="ion-android-star active"></i>
                                                                        <i class="ion-android-star active"></i>
                                                                        <i class="ion-android-star active"></i>
                                                                        <i class="ion-android-star-outline"></i>
                                                                    </span>
                                                                    </div>
                                                                    <h3 class="title"> <a href="{{ route('product',$product->slug)}}">{{ $product->name }}</a></h3>
                                                                    <p class="product-price"><span class="discounted-price">₹ {{ $discount = ($product->price * $product->discount) / 100; }}</span> <span class="main-price discounted">₹ {{ $product->price }}</span></p>
                                                                </div>
                                                            </div>
                                                            <!--  Single Grid product End -->
                                                        </div>
                                                            @endforeach
                                                            <!--  Single Grid product End -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row mb-30 mb-sm-40 mb-xs-30">
                                {!! $products->links() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Section End -->
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function addToCart(productId) {
        // Send an AJAX request to your Laravel backend
        axios.post('/cart/add/' + productId)
            .then(response => {
                // Handle the response, e.g., show a success message
                alert('Product added to cart successfully!');
            })
            .catch(error => {
                // Handle any errors, e.g., show an error message
                alert('Failed to add product to cart. Please try again.');
            });
    }
</script>
@endpush