 @php
     use App\Models\Cart;
     if(Auth::check()){
         $carts = Cart::where('user_id', Auth::user()->id)->get();
     }
 @endphp
 <!--Header section start-->
 <header class="header header-sticky d-none d-lg-block">
     <div class="header-default">
         <div
             class="container-fluid pl-115 pl-lg-15 pl-md-15 pl-sm-15 pl-xs-15 pr-115 pr-lg-15 pr-md-15 pr-sm-15 pr-xs-15">
             <div class="row align-items-center">
                 <!-- Header Logo Start -->
                 <div class="col-lg-12">
                     <div class="header-nav d-flex justify-content-between align-items-center">
                         <div class="header-logo text-center">
                             <a href="/"><img src="{{ asset('assets/images/logo.jpg') }}" alt=""></a>
                         </div>
                         <nav class="main-menu main-menu-two">
                             <ul>
                                 <li><a href="/">Home</a></li>
                                 <li><a href="{{ route('shop') }}">Shop</a></li>
                                 <li><a href="{{ route('new.arraival') }}">New Arraival</a></li>
                                 <li><a href="{{ route('blog') }}">Blog</a></li>
                                 <li><a href="{{ route('about_us') }}">About Us</a></li>
                                 <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                             </ul>
                         </nav>
                         <div class="header-right_wrap d-flex">
                             <div class="header-search">
                                 <button class="header-search-toggle"><i class="ion-ios-search-strong"></i></button>
                                 <div class="header-search-form">
                                     <form action="#">
                                         <input class="search-box" type="text" placeholder="Type and hit enter">
                                         <button><i class="ion-ios-search-strong"></i></button>
                                         <div class="suggesstion-box"></div>
                                     </form>
                                 </div>
                             </div>
                             <div class="header-cart">
                                 <a href="{{ route('cart') }}"><i class="ion-bag"></i><span>2</span></a>
                                 <!--Mini Cart Dropdown Start-->
                                 <div class="header-cart-dropdown">
                                     @guest
                                         {{-- user not login --}}
                                         @if (session('cart'))
                                             <ul class="cart-items">
                                                 @php
                                                     $cartTotal = 0; // Initialize the total cart value
                                                     $totalProductCount = 0;
                                                 @endphp
                                                 @foreach (session('cart') as $productId => $quantity)
                                                     @php
                                                         $total = $quantity['quantity'] * $quantity['price'];
                                                         $cartTotal += $total; // Add the total of each item to the cart total
                                                         $totalProductCount += $quantity['quantity']; // Add the quantity to the total product count
                                                     @endphp
                                                     <li class="single-cart-item">
                                                         <div class="cart-img">
                                                             <a href="{{ route('cart') }}"><img src="{{ asset($quantity['image']) }}" alt=""  height="60px;"></a>
                                                         </div>
                                                         <div class="cart-content">
                                                             <h5 class="product-name"><a
                                                                     href="{{ route('product', $quantity['slug']) }}">{{ $quantity['name'] }}</a>
                                                             </h5>
                                                             <span class="product-quantity">{{ $quantity['quantity'] }}
                                                                 ×</span>
                                                             <span class="product-price">₹ {{ $quantity['price'] }}</span>
                                                         </div>
                                                         <div class="cart-item-remove">
                                                             <form action="{{ route('cart.remove') }}" method="post">
                                                                 @csrf
                                                                 <input type="hidden" name="product_id"
                                                                     value="{{ $productId }}">
                                                                 <button type="submit" class="btn-delete"><i
                                                                         class="fa fa-trash"></i></button>
                                                             </form>
                                                         </div>
                                                     </li>
                                                 @endforeach
                                             </ul>
                                             <div class="cart-total">
                                                 <h5>Total : <span class="float-right">₹ {{ $cartTotal }}</span></h5>
                                             </div>
                                         @else
                                             <p>Your cart is empty.</p>
                                         @endif
                                         {{-- // Guest end --}}
                                     @else
                                         @if ($carts->isNotEmpty())
                                             <ul class="cart-items">
                                                 @php
                                                     $cartTotal = 0; // Initialize the total cart value
                                                     $totalProductCount = 0;
                                                 @endphp
                                                 @foreach ($carts as $productId => $quantity)
                                                     @php
                                                         $total = $quantity['quantity'] * $quantity['price'];
                                                         $cartTotal += $total; // Add the total of each item to the cart total
                                                         $totalProductCount += $quantity['quantity']; // Add the quantity to the total product count
                                                     @endphp
                                                     <li class="single-cart-item">
                                                         <div class="cart-img">
                                                             <a href="{{ route('cart') }}"><img
                                                                     src="{{ asset($quantity['image']) }}" alt=""
                                                                     height="60px;"></a>
                                                         </div>
                                                         <div class="cart-content">
                                                             <h5 class="product-name"><a
                                                                     href="{{ route('product', $quantity['slug']) }}">{{ $quantity['name'] }}</a>
                                                             </h5>
                                                             <span class="product-quantity">{{ $quantity['quantity'] }}
                                                                 ×</span>
                                                             <span class="product-price">₹ {{ $quantity['price'] }}</span>
                                                         </div>
                                                         <div class="cart-item-remove">
                                                             <form action="{{ route('cart.remove') }}" method="post">
                                                                 @csrf
                                                                 <input type="hidden" name="product_id"
                                                                     value="{{ $quantity->product_id }}">
                                                                 <button type="submit" class="btn-delete"><i
                                                                         class="fa fa-trash"></i></button>
                                                             </form>
                                                         </div>
                                                     </li>
                                                 @endforeach
                                             </ul>
                                             <div class="cart-total">
                                                 <h5>Total : <span class="float-right">₹ {{ $cartTotal }}</span></h5>
                                             </div>
                                         @else
                                             <p>Your cart is empty.</p>
                                         @endif
                                     @endguest
                                     <div class="cart-btn">
                                         <a href="{{ route('cart') }}">View Cart</a>
                                         <a href="{{ route('checkout') }}">checkout</a>
                                     </div>
                                 </div>
                                 <!--Mini Cart Dropdown End-->
                             </div>
                             <ul class="ht-us-menu">
                                 <li><a href="#"><i class="ion-android-settings"></i></a>
                                     <ul class="ht-dropdown right">
                                         <li><a href="{{ route('compare.index') }}">Compare Products</a></li>
                                         <li><a href="{{ route('account') }}">My Account</a></li>
                                         <li><a href="{{ route('whishlist') }}">My Wish List</a></li>
                                         @guest
                                             <li><a href="{{ route('login') }}">Sign In</a></li>
                                         @else
                                             <li><a href="{{ route('logout') }}">Sign Out</a></li>
                                         @endguest
                                     </ul>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- Header Logo Start -->
             </div>
         </div>
     </div>
 </header>
 <!--Header section end-->

 <!--Header Mobile section start-->
 <header class="header-mobile d-block d-lg-none">
     <div class="header-bottom menu-right">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="header-mobile-navigation d-block d-lg-none" style="display:none">
                         <div class="row align-items-center">
                             <div class="col-6 col-md-6">
                                 <div class="header-logo">
                                     <a href="/">
                                         <img src="{{ asset('assets/images/logo.jpg')}}" class="img-fluid" alt="">
                                     </a>
                                 </div>
                             </div>
                             <div class="col-6 col-md-6">
                                 <div class="mobile-navigation text-end">
                                     <div class="header-icon-wrapper">
                                         <ul class="icon-list justify-content-end">
                                             <li>
                                                 <div class="header-cart-icon">
                                                     <a href="{{ route('cart') }}"><i
                                                             class="ion-bag"></i><span>2</span></a>
                                                 </div>
                                             </li>
                                             <li>
                                                 <a href="javascript:void(0)" class="mobile-menu-icon"
                                                     id="mobile-menu-trigger"><i class="fa fa-bars"></i></a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!--Mobile Menu start-->
             <div class="offcanvas-mobile-menu inactive" id="offcanvas-mobile-menu">
                <a href="javascript:void(0)" class="offcanvas-menu-close" id="offcanvas-menu-close-trigger">
                    <i class="ion-android-close"></i>
                </a>
                <div class="offcanvas-wrapper">
                    <div class="offcanvas-inner-content">
                        <div class="offcanvas-mobile-search-area">
                            <form action="#">
                                <input class="search-box" type="text" placeholder="Type and hit enter">
                                <button><i class="ion-ios-search-strong"></i></button>
                                <div class="suggesstion-box"></div>
                            </form>
                        </div>
                        <nav class="offcanvas-navigation">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="{{ route('shop') }}">Shop</a></li>
                                    <li><a href="{{ route('new.arraival') }}">New Arraival</a></li>
                                    <li><a href="{{ route('blog') }}">Blog</a></li>
                                    <li><a href="{{ route('about_us') }}">About Us</a></li>
                                    <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                                </ul>
                        </nav>
                        <div class="offcanvas-settings">
                            <nav class="offcanvas-navigation">
                                <ul>
                                    <li class="menu-item-has-children"><span class="menu-expand"><i></i></span><a href="#">MY ACCOUNT </a>
                                        <ul class="submenu2" style="display: none;">
                                            <li><a href="{{ route('compare.index') }}">Compare Products</a></li>
                                            <li><a href="{{ route('account') }}">My Account</a></li>
                                            <li><a href="{{ route('whishlist') }}">My Wish List</a></li>
                                            @guest
                                                <li><a href="{{ route('login') }}">Sign In</a></li>
                                            @else
                                                <li><a href="{{ route('logout') }}">Sign Out</a></li>
                                            @endguest
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
        
                        <div class="offcanvas-widget-area">
                            <!--Off Canvas Widget Social Start-->
                            <div class="off-canvas-widget-social">
                                <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                                <a href="#" title="Youtube"><i class="fa fa-youtube-play"></i></a>
                                <a href="#" title="Vimeo"><i class="fa fa-vimeo-square"></i></a>
                            </div>
                            <!--Off Canvas Widget Social End-->
                        </div>
                    </div>
                </div>
        
            </div>
             <!--Mobile Menu end-->
         </div>
     </div>
 </header>
 <!--Header Mobile section end-->

 @push('scripts')
     <script>
         // AJAX call for autocomplete 
         $(document).ready(function() {
             $(".search-box").keyup(function() {
                 console.log("hello")
                 $.ajax({
                     type: "POST",
                     url: "{{ route('search.list') }}",
                     data: {
                         keyword: $(this).val(),
                         _token: '{{ csrf_token() }}'
                     },
                     beforeSend: function() {
                         // $(".search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                     },
                     success: function(data) {
                         // console.log(data);
                         $(".suggesstion-box").show();
                         $(".suggesstion-box").html(data);
                         $(".search-box").css("background", "#FFF");
                     }
                 });
             });
         });

         function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        }
     </script>
 @endpush
