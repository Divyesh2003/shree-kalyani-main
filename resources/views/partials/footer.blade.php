 <?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
 ?>
 <!--Footer section start-->
 <footer class="footer-section section bg-gray-two">
  <!--Footer Top start-->
  <div
      class="footer-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-15 pb-xs-5">
      <div class="container">
          <div class="row">

              <!--Footer Widget start-->
              <div class="footer-widget col-lg-6 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35">
                  <div class="footer-logo">
                      <a href="/"><img src="{{ asset('assets/images/logo.jpg') }}" alt=""></a>
                  </div>
                  <p>Head Office: U-28, Shree Kuberji Vision,  Kumbharia Gam Road, Saroli, Surat, Gujarat 395010</p>
                  <div class="f-social-title">
                      <h3>Follow Us On Social:</h3>
                  </div>
                  <div class="footer-social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-instagram"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                      <a href="#"><i class="fa fa-rss"></i></a>
                  </div>
              </div>
              <!--Footer Widget end-->
              <!--Footer Widget start-->
              <div class="footer-widget col-lg-2 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35">
                  <h4 class="title"><span class="text">Opening Time</span></h4>
                  <p class="mb-15">Mon – Fri: 8AM – 10PM</p>
                  <p class="mb-15">Sat: 9AM-8PM</p>
                  <p class="mb-15">Sun: Closed</p>
                  <h4 class="opeaning-title">We Work All The Holidays</h4>
              </div>
              <!--Footer Widget end-->
              <!--Footer Widget start-->
              <div class="footer-widget col-lg-2 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35">
                  <h4 class="title"><span class="text">My Account</span></h4>
                  <ul class="ft-menu"> 
                      <li><a href="{{ route('account') }}">My account</a></li>
                      <li><a href="{{ route('whishlist') }}">Wishlist</a></li>
                      <li><a href="{{ route('account') }}">Order Tracking</a></li>
                      <li><a href="{{ route('shipping') }}">Shipping Policy</a></li>
                      <li><a href="{{ route('shipping.info') }}">Shipping Information</a></li>
                  </ul>
              </div>
              <!--Footer Widget end-->
              <!--Footer Widget start-->
              <div class="footer-widget col-lg-2 col-md-6 col-sm-6 col-12 mb-40 mb-xs-35">
                  <h4 class="title"><span class="text">About Us</span></h4>
                  <ul class="ft-menu">
                      <li><a href="{{ route('about_us')}}">About Us</a></li>
                      <li><a href="#">Shopping Guide</a></li>
                      <li><a href="{{ route('delivery.info') }}">Delivery Information</a></li>
                      <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                      <li><a href="{{ route('shop')}}">Our Store</a></li>
                  </ul>
              </div>
              <!--Footer Widget end-->
          </div>
      </div>
  </div>
  <!--Footer Top end-->
  <!--Footer bottom start-->
  <div class="footer-bottom section">
      <div class="container">
          <div class="row g-0">
              <div class="col-12 ft-border pt-25 pb-25">
                  <div class="row justify-content-between align-items-center">
                      <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="copyright text-start">
                              <p>. All rights reserved.</p>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="footer-nav text-end">
                              <nav>
                                  <ul>
                                      <li><a href="{{ route('privacy')}}">Policy</a></li>
                                      <li><a href="{{ route('contact_us')}}">Help</a></li>
                                  </ul>
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--Footer bottom end-->
</footer>
<!--Footer section end-->
  <!-- Modal Area Strat -->
  <div class="modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="col-xl-12 col-lg-12">
                  <div class="row">
                      <div class="col-lg-4 col-md-6">
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
                                      <img src="{{ asset('assets/images/product/large-product/l-product-1.webp') }}" alt="">
                                      <a href="{{ asset('assets/images/product/large-product/l-product-1.webp') }}"></a>
                                  </div>
                                  <div class="lg-image">
                                      <img src="{{ asset('assets/images/product/large-product/l-product-2.webp') }}" alt="">
                                      <a href="{{ asset('assets/images/product/large-product/l-product-2.webp') }}"></a>
                                  </div>
                                  <div class="lg-image">
                                      <img src="{{ asset('assets/images/product/large-product/l-product-3.webp') }}" alt="">
                                      <a href="{{ asset('assets/images/product/large-product/l-product-3.webp') }}"></a>
                                  </div>
                                  <div class="lg-image">
                                      <img src="{{ asset('assets/images/product/large-product/l-product-4.webp') }}" alt="">
                                      <a href="{{ asset('assets/images/product/large-product/l-product-4.webp') }}"></a>
                                  </div>
                                  <div class="lg-image">
                                      <img src="{{ asset('assets/images/product/large-product/l-product-5.webp') }}" alt="">
                                      <a href="{{ asset('assets/images/product/large-product/l-product-5.webp') }}"></a>
                                  </div>
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
                                      }' data-slick-responsive='[
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
                                  <div class="sm-image"><img
                                          src="{{ asset('assets/images/product/small-product/s-product-1.webp') }}"
                                          alt="product image thumb"></div>
                                  <div class="sm-image"><img
                                          src="{{ asset('assets/images/product/small-product/s-product-2.webp') }}"
                                          alt="product image thumb"></div>
                                  <div class="sm-image"><img
                                          src="{{ asset('assets/images/product/small-product/s-product-3.webp') }}"
                                          alt="product image thumb"></div>
                                  <div class="sm-image"><img
                                          src="{{ asset('assets/images/product/small-product/s-product-4.webp') }}"
                                          alt="product image thumb"></div>
                                  <div class="sm-image"><img
                                          src="{{ asset('assets/images/product/small-product/s-product-5.webp') }}"
                                          alt="product image thumb"></div>
                              </div>
                          </div>
                          <!--Product Details Left -->
                      </div>
                      <div class="col-lg-8 col-md-6">
                          <!--Product Details Content Start-->
                          <div class="product-details-content">
                              <!--Product Nav Start-->
                              <div class="product-nav">
                                  <a href="#"><i class="fa fa-angle-left"></i></a>
                                  <a href="#"><i class="fa fa-angle-right"></i></a>
                              </div>
                              <!--Product Nav End-->
                              <h2>Aliquam lobortis est turpis mauris egestas eget</h2>
                              <div class="single-product-reviews">
                                  <i class="fa fa-star active"></i>
                                  <i class="fa fa-star active"></i>
                                  <i class="fa fa-star active"></i>
                                  <i class="fa fa-star active"></i>
                                  <i class="fa fa-star-o"></i>
                                  <a class="review-link" href="#">(1 customer review)</a>
                              </div>
                              <div class="single-product-price">
                                  <span class="price new-price">$66.00</span>
                                  <span class="regular-price">$77.00</span>
                              </div>
                              <div class="product-description">
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                      veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et
                                      mattis vulputate, tristique ut lectus</p>
                              </div>
                              <div class="single-product-quantity">
                                  <form class="add-quantity" action="#">
                                      <div class="product-quantity">
                                          <input value="1" type="number">
                                      </div>
                                      <div class="add-to-link">
                                          <button class="btn"><i class="ion-bag"></i>add to cart</button>
                                      </div>
                                  </form>
                              </div>
                              <div class="wishlist-compare-btn">
                                  <a href="#" class="wishlist-btn">Add to Wishlist</a>
                                  <a href="#" class="add-compare">Compare</a>
                              </div>
                              <div class="product-meta">
                                  <span class="posted-in">
                                      Categories:
                                      <a href="#">Accessories</a>,
                                      <a href="#">Electronics</a>
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
<!-- modalc Start -->
@guest
@else
@if($user->email == null)
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Update Email</h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
                <form action="{{ route('account.update.email') }}" method="post">
                    @csrf()
                    @method('post')
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="email" name="email" id="" class="form-control" required>
                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                </form>
        </div>
      </div>
    </div>
  </div>
  @endif
  @endguest
<!-- modalc End -->
<!-- / Layout wrapper -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    @stack('scripts')
  <script>
    $(document).ready(function() {
        $('.quick-view-btn').on('click', function(e) {
            console.log("hello")
            e.preventDefault();
            var productId = $(this).data('product-id');
            
            $.ajax({
                url: '{{ url("/product") }}/' + productId + '/details',
                method: 'GET',
                success: function(response) {
                    console.log(response)
                    if (response.status === 'success') {
                        var product = response.product;
                        $('#quick-view-modal-container .modal-body').html(`
                            <div class="col-xl-12 col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="product-details-left">
                                            <div class="product-details-images">
                                                <div class="lg-image">
                                                    <img src="{{ asset('` + product.image + `') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6">
                                        <div class="product-details-content">
                                            <h2>` + product.name + `</h2>
                                            <div class="single-product-price">  
                                                <span class="price new-price">₹` + (product.price * product.discount)/100 + `</span>
                                                <span class="main-price discounted" style="text-decoration: line-through;">₹ ` + product.price +`</span>
                                            </div>
                                            <div class="product-description">
                                                <p>` + product.description + `</p>
                                                <div class="row"> 
                                                    <div class="col-sm-6"> 
                                                      <div> Base Color :- `+ product.base_color +` </div> 
                                                      <div> Blouse :- `+ product.blouse +` </div>
                                                      <div> Blouse Color :- `+ product.blouse_color +` </div>
                                                      <div> Blouse Material :- `+ product.blouse_material +` </div>
                                                      <div> Blouse Work :- `+ product.blouse_work +` </div>
                                                      <div> Chuni :- `+ product.chuni +` </div>
                                                      <div> Chuni Color :- `+ product.chuni_color +` </div>
                                                      <div> Chuni Material :- `+ product.chuni_material +` </div>
                                                      <div> Chuni Work :- `+ product.chuni_work +` </div>
                                                      <div> Compitation Color :- `+ product.compitation_color +` </div>
                                                      <div> Decoration:- `+ product.decdoration +` </div>
                                                      <div> Design Code :- `+ product.design_code +` </div>
                                                      <div> Discount :- `+ product.discount +` </div>
                                                      <div> Extra Work:- `+ product.extra_work +` </div>
                                                      <div> Febric :- `+ product.febric +` </div>
                                                      <div> HSN Code :- `+ product.hsn_code +` </div>
                                                     </div>
                                                     <div class="col-sm-6"> 
                                                      <div> Image Code :- `+ product.image_code +` </div> 
                                                      <div> Item Code :- `+ product.item_code +` </div>
                                                      <div> Item Type :- `+ product.item_type +` </div>
                                                      <div> Item Weight :- `+ product.item_weight +` </div>
                                                      <div> Length :- `+ product.length +` </div>
                                                      <div> Material Composition :- `+ product.material_composition +` </div>
                                                      <div> Occasion Type :- `+ product.occasion_type +` </div>
                                                      <div> Patterns :- `+ product.patterns +` </div>
                                                      <div> Washing Instruction :- `+ product.washing_instruction +` </div>
                                                      <div> Weave Type :- `+ product.weave_type +` </div>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="single-product-quantity">
                                                <form class="add-quantity" action="{{ route('cart.add', '') }}/` + product.id + `" method="POST">
                                                    @csrf
                                                    <div class="product-quantity">
                                                        <input value="1" type="number" name="qty">
                                                    </div>
                                                    <div class="add-to-link">
                                                        <button type="submit" class="btn"><i class="ion-bag"></i>add to cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                        $('#quick-view-modal-container').modal('show');
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while fetching the product details.');
                }
            });
        });
    });
    </script>
  </body>
</html>