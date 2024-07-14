@extends('layouts.app')
@section('content')
<!-- Page Banner Section Start -->
<div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/bg/bg-22.png') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-banner text-center">
                    <h2>Thankyou</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>Thankyou</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->
<div class="thankyou section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 ">
    <div class="container sb-border pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="row">
            <div class="col-12 border p-5">
     <!-- Checkout Form Start-->
                <h1 class="text-center">Thank You</h1>
                <p class="text-center">Thank you for order As soon As possible inquiry</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('home') }}" class="btn ">Home</a>       
                </div>
            </div>
        </div>            
    </div>
</div>
@endsection
@push('scripts')
@endpush