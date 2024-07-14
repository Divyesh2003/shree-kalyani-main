@php
use Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('content')
  <!-- Page Banner Section Start -->
  <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/bg/bg-3.png') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="page-banner text-center">
                    <h2>My Account</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->
@if (session('status'))
<div>{{ session('status') }}</div>
@endif
<!--My Account section start-->
<div class="my-account-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
    <div class="container sb-border pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="row">
            
            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                Dashboard</a>
                            <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                            <a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>
                            <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                Method</a>
                            <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> address</a>
                            <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                            <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->

                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>
                                    <div class="welcome mb-20">
                                        <p>Hello, <strong>{{ $user->firstname }} {{ $user->lastname }}</strong> (If Not <strong>Tuntuni !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                    </div>
                                    <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                                        recent orders, manage your shipping and billing addresses and edit your
                                        password and account details.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            {{-- @dd($orders) --}}
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $key => $order)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $order->title }}</td>
                                                    <td>{{ Carbon::parse($order['created_at'])->format('M d, Y') }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>{{ $order->total_value }}</td>
                                                    <td><a href="{{ route('single.order',$order->id) }}" class="btn">View</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->

                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="download" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Downloads</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $key => $order)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $order->title }}</td>
                                                    <td>{{ Carbon::parse($order['created_at'])->format('M d, Y') }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>{{ $order->total_value }}</td>
                                                    <td><a href="{{ route('single.order.dowload',$order->id) }}" class="btn">Download</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Payment Method</h3>
                                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Billing Address</h3>
                                    {{-- @dd($user) --}}
                                    <address>
                                        <span><strong>{{ $user->firstname }} {{ $user->lastname }}</strong></span><br>
                                        <span>{{ $user->addaress_1}} <br>
                                            <span>{{ $user->addaress_2}} <br>
                                           {{ $user->city }}, {{ $user->state }} {{ $user->pincode }}</span>
                                        <span>Mobile: {{ $user->mobile }}</span>
                                    </address>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Edit Address
                                      </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ route('account.update') }}" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Address Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                {{-- <div class="col-lg-12 col-12 mb-30">
                                                    <label>Country*</label>
                                                    <select class="form-control" name="country" id="country">
                                                        <option selected>Select Country</option>
                                                        @foreach ($coutries as $country)
                                                            <option value="{{ $country->id }}" @if($user->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col-lg-12 col-12 mb-30">
                                                    <select class="form-select" name="state" id="state">
                                                       
                                                        </select>
                                                        @error('state')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div> --}}
                                                <div class="col-lg-12 col-12 mb-30">
                                                    <label>State*</label>
                                                    <input id="state" class="form-control" name="state" placeholder="Enter City" type="text" value="{{ $user->state }}">
                                                    @error('state')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col-lg-12 col-12 mb-30">
                                                    <label>City*</label>
                                                    <input id="city" class="form-control" name="city" placeholder="Enter City" type="text" value="{{ $user->city }}">
                                                    @error('city')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col-lg-12 col-12 mb-30">
                                                    <label>Address 1*</label>
                                                    <input id="address_1" class="form-control" name="address_1" placeholder="Enter Address" type="text" value="{{ $user->addaress_1 }}">
                                                    @error('address_1')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col-lg-12 col-12 mb-30">
                                                    <label>Address 2*</label>
                                                    <input id="address_2" class="form-control" name="address_2" placeholder="Enter Address" type="text" value="{{ $user->addaress_2 }}">
                                                    @error('address_2')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div>
                                </div>
                            </div></div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>
                                    {{-- @dd($user) --}}
                                    <div class="account-details-form">
                                        <form action="{{ route('account.update') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="first-name" name="firstname" placeholder="First Name" type="text" value="{{ $user->firstname }}">
                                                    @error('firstname')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="lastname" placeholder="Last Name" name="lastname" type="text" value="{{ $user->lastname }}">
                                                    @error('lastname')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col-12 mb-30">
                                                    <input id="email" placeholder="Email Address" type="email" name="email" value="{{ $user->email }}">
                                                    @error('email')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col-12 mb-30"><h4>Password change</h4></div>
                                                <div class="col-12 mb-30">
                                                    <input id="current-pwd" placeholder="Current Password" type="password" name="current_password">
                                                    @error('current_password')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="new-pwd" placeholder="New Password" type="password" name="password">
                                                    @error('password')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="confirm-pwd" placeholder="Confirm Password" type="password" name="new_password">
                                                    @error('new_password')
                                                    <div>{{ $message }}</div>
                                                @enderror
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="save-change-btn">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>
            </div>
        </div> 
    </div>           
</div>
<!--My Account section end-->
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
<script>
    $(document).ready(function() {
        $('#country').change(function() {
            var countryId = $(this).val();
            if (countryId) {
                $.ajax({
                    url: '/get-states/' + countryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#state').empty();
                        $('#state').append('<option value="">Select State</option>');
                        $.each(data, function(key, value) {
                            $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#state').empty();
                $('#state').append('<option value="">Select State</option>');
            }
        });
    });
</script>
@endpush