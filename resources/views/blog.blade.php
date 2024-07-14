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
                    <h2>Blog</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->

<!-- Blog Section Start -->
<div class="blog-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
    <div class="container sb-border pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <!-- Single Sidebar Start  -->
                <div class="common-sidebar-widget">
                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-search">
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Single Sidebar End  -->
                <!-- Single Sidebar Start  -->
                <div class="common-sidebar-widget">
                    <h3 class="sidebar-title">Recent posts</h3>
             @foreach ($recentPosts as $recent)
                    <div class="sidebar-blog">
                        <a href="{{ route('blog.single',$recent->slug) }}" class="image"><img src="{{ asset($recent->image) }}" alt=""></a>
                        <div class="content">
                            <h5><a href="{{ route('blog.single',$recent->slug) }}">{{ $recent->name }}</a></h5>
                            <span>{{ $time =  Carbon::createFromFormat('Y-m-d H:i:s', $recent->created_at) }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Single Sidebar End  -->
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="row">
                    @foreach ($blogs as $blog)
                    {{-- @dd($blog) --}}
                    <div class="col-12">
                        <!-- Single Blog List Start -->
                       <div class="blog-list mb-40">
                          <div class="row">
                              <div class="col-md-5">
                                   <div class="blog-image">
                                       <a href="{{ route('blog.single',$blog->slug) }}"><img src="{{ asset($blog->image) }}" alt=""></a>
                                       <div class="post-category">
                                           <a href="">{{ $blog->parent->name }} </a>
                                       </div>
                                   </div>
                              </div>
                              <div class="col-md-7">
                                  <div class="blog-content">
                                       <h3 class="title"><a href="{{ route('blog.single',$blog->slug) }}">{{ $blog->name }}</a></h3>
                                       <ul class="meta">
                                           <li>By <a href="#" tabindex="0">admin</a></li>
                                           <li>{{ $time =  Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at) }}</li>
                                       </ul>
                                       <p>{{ substr($blog->description, 0, 200) }}</p>
                                       <a href="{{ route('blog.single',$blog->slug) }}" class="btn">Read more</a>
                                  </div>
                              </div>
                          </div>
                       </div>
                        <!-- Single Blog List End -->
                   </div>
                    @endforeach
                </div>
                <div class="row mb-0 mb-xs-35 mb-sm-35">
                    <div class="col">
                        {!! $blogs->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Section End -->

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