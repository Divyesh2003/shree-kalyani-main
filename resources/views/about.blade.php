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
                        <h2>About Us</h2>
                        <ul class="page-breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner Section End -->
    <!--About Us Area Start-->
    <div class="about-us-area section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <!--About Us Image Start-->
                    <div class="about-us-img-wrapper">
                        <div class="about-us-image">
                            <a href="#"><img src="{{ asset('assets/images/about/about-us-banner1.webp') }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <!--About Us Image End-->

                    <!--About Us Content Start-->
                    <div class="about-us-content">
                        <h4>We are a digital agency focused on delivering content and utility user-experiences.</h4>
                        <p>Our organization has been a stalwart in the industry, proudly serving as a trusted bridge between
                            suppliers and buyers for over year. With a rich legacy of experience, we have cultivated
                            relationships with over suppliers, each meticulously chosen for their commitment to quality and
                            reliability. Our vast network ensures a diverse and extensive range of products to meet the
                            varied demands of our esteemed clientele. On the buyer's front, we are proud to have connected
                            with over buyers, understanding their unique requirements and facilitating seamless
                            transactions. Over the years, our dedication to excellence, transparency, and fostering mutually
                            beneficial partnerships has solidified our position as a go-to agency for businesses seeking
                            reliable connections in the marketplace. Join us on this journey, where decades of expertise
                            converge with a commitment to driving success for both suppliers and buyers alike.</p>
                        <h3>Supplier </h3>
                        <p> Welcome to our dedicated platform connecting you with reliable Commission Agents for all your
                            cloth-selling needs! We understand the intricate dynamics of the textile industry, and our
                            network of experienced agents is here to streamline and enhance your business. Whether you are a
                            manufacturer looking to expand your reach or a retailer seeking a strategic partnership, our
                            Commission Agents are committed to maximizing your profits and ensuring a seamless transaction
                            process. With a proven track record of successful collaborations, our agents possess extensive
                            knowledge of market trends and a keen eye for potential opportunities. Trust us to bridge the
                            gap between buyers and sellers, providing a platform where mutually beneficial partnerships
                            thrive. Join us and experience the efficiency, transparency, and expertise that our Commission
                            Agents bring to the world of cloth selling. Your success is our priority!</p>
                        <h3> Buyer</h3>
                        <p>Welcome to our platform tailored to cater to the discerning needs of cloth buyers! We take pride
                            in presenting a network of trusted Commission Agents dedicated to assisting buyers in finding
                            the perfect textiles for their needs. Whether you're a boutique owner, fashion designer, or
                            retailer, our experienced agents are committed to sourcing high-quality fabrics that meet your
                            specifications. Our platform simplifies the buying process, connecting you with reliable
                            suppliers and ensuring a seamless transaction experience. With a keen understanding of market
                            trends and an extensive network of textile producers, our Commission Agents are equipped to
                            match buyers with the finest fabrics available. Join us and explore a world of opportunities
                            where your cloth sourcing requirements are met with efficiency, transparency, and a commitment
                            to quality. Elevate your buying experience with our trusted Commission Agents today!</p>
                        </p>
                        <div class="signeture-image">
                            <img src="{{ asset('assets/images/about/about-us-signature.webp') }}" alt="">
                        </div>
                    </div>
                    <!--About Us Content End-->
                </div>
            </div>
        </div>
    </div>
    <!--About Us Area End-->

    <!--Feature section start-->
    <div
        class="feature-section section bg-gray-two pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Single Feature Start -->
                    <div class="single-feature feature-style-two mb-30">
                        <div class="feature-image">
                            <img src="{{ asset('assets/images/icons/about-us-policy1.webp') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="feature-content">
                            <h4 class="title">Creative Design</h4>
                            <p class="short-desc">Creative design in the textile industry is pivotal in driving innovation
                                and setting trends. It encompasses the imaginative process of conceptualizing patterns,
                                colors, and textures that transform raw materials into visually captivating and functional
                                fabrics. Designers blend artistic vision with technical expertise to create textiles that
                                appeal to diverse markets, from fashion to home décor. </p>
                        </div>
                    </div>
                    <!-- Single Feature End -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Single Feature Start -->
                    <div class="single-feature feature-style-two mb-30">
                        <div class="feature-image">
                            <img src="{{ asset('assets/images/icons/about-us-policy2.webp') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="feature-content">
                            <h4 class="title">Content Marketing</h4>
                            <p class="short-desc">We help you promote your business through our extensive network, utilizing
                                a variety of textile-focused opportunities such as social media marketing and email
                                marketing</p>
                        </div>
                    </div>
                    <!-- Single Feature End -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Single Feature Start -->
                    <div class="single-feature feature-style-two mb-30">
                        <div class="feature-image">
                            <img src="{{ asset('assets/images/icons/about-us-policy3.webp') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="feature-content">
                            <h4 class="title">Optimization Services</h4>
                            <p class="short-desc">We assist you in enhancing your textile selection within the curriculum of
                                current trends, thereby improving visibility in textile searches. This can result in
                                increased business for your shop and higher conversion rates.</p>
                        </div>
                    </div>
                    <!-- Single Feature End -->
                </div>
            </div>
        </div>
    </div>
    <!--Feature section end-->
    <!-- Service Section Area Start -->
    <div
        class="service-section section  pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Single Service Start -->
                    <div class="single-service mb-30">
                        <div class="service-img">
                            <img src="{{ asset('assets/images/about/about-1.webp') }}" alt="">
                        </div>
                        <div class="service-content">
                            <h4 class="title">Top Notch Support</h4>
                            <p>We are committed to providing our clients with top-notch support. Our team is available 24/7
                                to answer your questions and resolve any issues you may encounter. We believe that our
                                support is one of our greatest strengths, and we are proud to offer it to our clients.</p>
                        </div>
                    </div>
                    <!-- Single Service End -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Single Service Start -->
                    <div class="single-service mb-30">
                        <div class="service-img">
                            <img src="{{ asset('assets/images/about/about-2.webp') }}" alt="">
                        </div>
                        <div class="service-content">
                            <h4 class="title">Contemporary Support</h4>
                            <p>Our team is made up of highly skilled and experienced professionals who are up-to-date on the
                                latest trends and technologies. We are constantly investing in our team's development to
                                ensure that we can provide our clients with the highest level of service.</p>
                        </div>
                    </div>
                    <!-- Single Service End -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Single Service Start -->
                    <div class="single-service mb-30">
                        <div class="service-img">
                            <img src="{{ asset('assets/images/about/about-3.webp') }}" alt="">
                        </div>
                        <div class="service-content">
                            <h4 class="title">Competitive </h4>
                            <p>We offer some of the most competitive rates in the industry, without sacrificing quality. We
                                understand that cost is an important factor when choosing a service provider, and we are
                                committed to providing our clients with the best possible value for their money.</p>
                        </div>
                    </div>
                    <!-- Single Service End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Service Section Area End -->

    <!-- Accrodion And Testimonial Section Start -->
    <div class="accrodion-and-testimonial-section section">
        <div class="container sb-border pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="row">
                <div class="col-lg-6">
                    <!--FAQ Accordin Start-->
                    <div class="faq-area mb-sm-50 mb-xs-40">
                        <h3 class="title">What can we do for you ?</h3>
                        <div class="faq-accordion">
                            <div id="accordion">
                                <div class="card card-style-two actives">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a class="" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Which areas of textile do you cover
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-bs-parent="#accordion">
                                        <div class="card-body">
                                            We cover all aspects of textile i.e. Saree, Lahanga, Suits, Poshak etc. carried
                                            out. We also cover all aspects of designing work with our dedicated designing
                                            team. All our vision are undertaken both party and daily wear.
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-style-two">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Which areas of construction do you cover
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordion">
                                        <div class="card-body">
                                            We cover all aspects of building works from ground works to roofing,
                                            refurbishments & extensions, interior and exterior works carried out. We also
                                            cover all aspects of building work with our dedicated building division team.
                                            All our landscape services are undertaken both commercially and domestically.
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-style-two">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                How do you manage textile quality
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-bs-parent="#accordion">
                                        <div class="card-body">
                                            Over the daceds experience; The system for managing quality should encompass the
                                            organizational structure, procedures, processes, and resources, as well as
                                            activities to ensure confidence that the API will meet its intended
                                            specifications for quality and purity. All quality-related activities should be
                                            defined and documented.
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-style-two">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                Which areas of construction do you cover
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                        data-bs-parent="#accordion">
                                        <div class="card-body">
                                            We cover all aspects of building works from ground works to roofing,
                                            refurbishments & extensions, interior and exterior works carried out. We also
                                            cover all aspects of building work with our dedicated building division team.
                                            All our landscape services are undertaken both commercially and domestically.
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-style-two">
                                    <div class="card-header" id="headingFive">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                How do you manage construction quality
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                        data-bs-parent="#accordion">
                                        <div class="card-body">
                                            The system for managing quality should encompass the organizational structure,
                                            procedures, processes, and resources, as well as activities to ensure confidence
                                            that the API will meet its intended specifications for quality and purity. All
                                            quality-related activities should be defined and documented.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--FAQ Accordin Start-->
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-area">
                        <h3 class="title">What can we do for you ?</h3>
                        <div class="testimonial-wrap bg-gray-two">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="testimonial-wrapper section-space--inner">
                                        <div class="tf-element-carousel"
                                            data-slick-options='{
                                        "slidesToShow": 1,
                                        "slidesToScroll": 1,
                                        "infinite": true,
                                        "arrows": false,
                                        "dots": true
                                        }'
                                            data-slick-responsive='[
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
                                                        <p class="testimonial-text"> Sed vel urna at dui iaculis gravida.
                                                            Maecenas pretium, velit vitae placerat faucibus, velit quam
                                                            facilisis elit, sit amet lacinia est est id ligula. Duis feugiat
                                                            quam non justo faucibus, in gravida diam tempor. Nam viverra
                                                            enim non ipsum ornare, condimentum blandit diam mattis. Maecenas
                                                            gravida mol..</p>
                                                        <img src="{{ asset('assets/images/icons/quote-icon.webp') }}"
                                                            alt="">
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
                                                        <p class="testimonial-text"> Sed vel urna at dui iaculis gravida.
                                                            Maecenas pretium, velit vitae placerat faucibus, velit quam
                                                            facilisis elit, sit amet lacinia est est id ligula. Duis feugiat
                                                            quam non justo faucibus, in gravida diam tempor. Nam viverra
                                                            enim non ipsum ornare, condimentum blandit diam mattis. Maecenas
                                                            gravida mol..</p>
                                                        <img src="{{ asset('assets/images/icons/quote-icon.webp') }}"
                                                            alt="">
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
                                                        <p class="testimonial-text"> Sed vel urna at dui iaculis gravida.
                                                            Maecenas pretium, velit vitae placerat faucibus, velit quam
                                                            facilisis elit, sit amet lacinia est est id ligula. Duis feugiat
                                                            quam non justo faucibus, in gravida diam tempor. Nam viverra
                                                            enim non ipsum ornare, condimentum blandit diam mattis. Maecenas
                                                            gravida mol..</p>
                                                        <img src="{{ asset('assets/images/icons/quote-icon.webp') }}"
                                                            alt="">
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
    </div>
    <!-- Accrodion And Testimonial Section End -->

    <!--NewsLetter section start-->
    <div
        class="newsLetter-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter-wrapper">
                        <p class="small-text">Special Ofers For Subscribers</p>
                        <h3 class="title">Ten Percent Member Discount</h3>
                        <p class="short-desc">Subscribe to our newsletters now and stay up to date with new collections,
                            the latest lookbooks and exclusive offers.</p>

                        <div class="newsletter-form">
                            <form id="mc-form" action="{{ route('suscribe') }}" method="post" class="mc-form">
                                @csrf()
                                @method('post')
                                <input type="email" name="email" placeholder="Enter Your Email Address Here..."
                                    required>
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
