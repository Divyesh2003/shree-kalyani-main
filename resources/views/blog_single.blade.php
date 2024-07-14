@php
    use Carbon\Carbon;
@endphp
@extends('layouts.app')
@section('content')
 <!-- Page Banner Section Start -->
 <div class="page-banner-section section bg-image" data-bg="{{ asset('assets/images/bg/bg-2.png') }}">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="page-banner text-center">
                    <h2>{{ $blog->name }}</h2>
                    <ul class="page-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>{{ $blog->name }}</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Page Banner Section End -->

<!-- Blog Section Start -->
<div class="blog-section section pt-100 pt-lg-80 pt-md-70 pt-sm-50 pt-xs-40">
    <div class="container sb-border pb-80 pb-lg-60 pb-md-50 pb-sm-60 pb-xs-50">
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
                        <a href="{{ route('blog.single',$blog->slug) }}" class="image"><img src="{{ asset($recent->image) }}" alt=""></a>
                        <div class="content">
                            <h5><a href="{{ route('blog.single',$recent->slug) }}">{{ $recent->name }}</a></h5>
                            <span>{{ $time =  Carbon::createFromFormat('Y-m-d H:i:s', $recent->created_at) }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Single Sidebar End  -->
            </div>
            <div class="col-lg-9 mb-sm-40 mb-xs-30">
                <div class="blog_area">
                    <article class="blog_single blog-details">
                        <header class="entry-header">
                            <span class="post-category">
                                <a href="#">{{ $blog->parent->name }}</a>
                            </span>
                            <h2 class="entry-title">
                              {{ $blog->name }}
                            </h2>
                            <span class="post-author">
                            <span class="post-by"> Posts by : </span> admin </span>
                            <span class="post-separator">|</span>
                            <span class="post-date"><i class="fas fa-calendar-alt"></i>{{ $time =  Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at) }} </span>
                        </header>
                        <div class="post-thumbnail img-full">
                            <img src="./assets/images/blog/blog-details-1.jpg" alt="">
                        </div>
                        <div class="postinfo-wrapper">
                            <div class="post-info">
                                <div class="entry-summary blog-post-description">
                                    {!! $blog->description !!}
                                    <!--Blog Post Tag-->
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title">Share this post</h3>
                                            <ul class="blog-social-icons">
                                                <li>
                                                    <a target="_blank" title="Facebook" href="#" class="facebook social-icon">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" title="twitter" href="#" class="twitter social-icon">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" title="pinterest" href="#" class="pinterest social-icon">
                                                        <i class="fa fa-pinterest"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blank" title="linkedin" href="#" class="linkedin social-icon">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <div class="relatedposts">
                        <h3>Related posts</h3>
                        <div class="row">
                            @foreach ($relatedBlog as $related)
                            <div class="col-md-4 col-sm-6">
                                <div class="relatedthumb mb-xs-30">
                                    <div class="image">
                                        <a href="{{ route('blog.single',$related->slug) }}"><img src="{{ asset($related->image) }}" alt=""></a>
                                    </div>
                                    <h4><a href="{{ route('blog.single',$related->slug) }}">{{ $related->name }}</a></h4>
                                    <span class="rl-post-date">December 1, 2018</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--Comment Area Start-->
                <div class="comments-area mt-85 mt-lg-65 mt-md-55 mt-md-45 mt-sm-15 mt-xs-0">
                    <h3>3 comments</h3>
                    <ol class="commentlist">
                        <li>
                            <div class="single-comment">
                                <div class="comment-avatar img-full">
                                    <img src="./assets/images/icons/author.png" alt="">
                                </div>
                                <div class="comment-info">
                                    <a href="#">admin</a>
                                    <div class="reply">
                                        <a href="#">Reply</a>
                                    </div>
                                    <span class="date">October 6, 2014 at 1:38 am</span>
                                    <p>just a nice post</p>
                                </div>
                            </div>
                            <ol>
                                <li>
                                    <div class="single-comment">
                                        <div class="comment-avatar img-full">
                                            <img src="./assets/images/icons/author.png" alt="">
                                        </div>
                                        <div class="comment-info">
                                            <a href="#">admin</a>
                                            <div class="reply">
                                                <a href="#">Reply</a>
                                            </div>
                                            <span class="date">October 6, 2014 at 1:38 am</span>
                                            <p>just a nice post</p>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>
                    </ol>
                    <ol class="commentlist">
                        <li>
                            <div class="single-comment">
                                <div class="comment-avatar img-full">
                                    <img src="./assets/images/icons/author.png" alt="">
                                </div>
                                <div class="comment-info">
                                    <a href="#">admin</a>
                                    <div class="reply">
                                        <a href="#">Reply</a>
                                    </div>
                                    <span class="date">October 6, 2014 at 1:38 am</span>
                                    <p>just a nice post</p>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="comment-box mt-30">
                    <h3>Leave a Comment</h3>
                    <form action="#">
                        <p class="comment-note"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label>Comment*</label>
                                    <textarea name="commenter-message" placeholder="Message" id="commenter-message" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-input">
                                    <label>Name*</label>
                                    <input name="commenter-name" id="commenter-name" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-input">
                                    <label>Email*</label>
                                    <input name="commenter-email" id="commenter-email" type="email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-input">
                                    <label>Website*</label>
                                    <input name="commenter-url" id="commenter-url" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <button class="form-button" type="submit">Post Comment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Comment Area End-->
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
<!-- Shop Section End -->
@endsection
@push('scripts')

@endpush