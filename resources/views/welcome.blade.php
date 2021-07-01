@extends('layouts.client')
@section('title', '')
@section('content')
    
<!-- ***** Hero Area Start ***** -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(medical/img/bg-img/hero1.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Medical Services that <br>You can Trust
                                100%</h2>
                            <h6 data-animation="fadeInUp" data-delay="400ms">Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit sed diam nonummy nibh euismod.</h6>
                            <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp"
                                data-delay="700ms">Discover Medifile <span>+</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay-white"
            style="background-image: urlmedical/img/bg-img/breadcumb3.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Medical Services that <br>You can Trust
                                100%</h2>
                            <h6 data-animation="fadeInUp" data-delay="400ms">Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit sed diam nonummy nibh euismod.</h6>
                            <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp"
                                data-delay="700ms">Discover Medifile <span>+</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay-white"
            style="background-image: urlmedical/img/bg-img/breadcumb1.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Medical Services that <br>You can Trust
                                100%</h2>
                            <h6 data-animation="fadeInUp" data-delay="400ms">Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit sed diam nonummy nibh euismod.</h6>
                            <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp"
                                data-delay="700ms">Discover Medifile <span>+</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Hero Area End ***** -->

<!-- ***** Book An Appoinment Area Start ***** -->
{{--  <div class="medilife-book-an-appoinment-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="appointment-form-content">
                    <div class="row no-gutters align-items-center">
                        <div class="col-12 col-lg-9">
                            <div class="medilife-appointment-form">
                                <form action="#" method="post">
                                    <div class="row align-items-end">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <select class="form-control" id="speciality">
                                                    <option>Speciality 1</option>
                                                    <option>Speciality 2</option>
                                                    <option>Speciality 3</option>
                                                    <option>Speciality 4</option>
                                                    <option>Speciality 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <select class="form-control" id="doctors">
                                                    <option>Doctors 1</option>
                                                    <option>Doctors 2</option>
                                                    <option>Doctors 3</option>
                                                    <option>Doctors 4</option>
                                                    <option>Doctors 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="date" id="date"
                                                    placeholder="Date">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="time" id="time"
                                                    placeholder="Time">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control border-top-0 border-right-0 border-left-0"
                                                    name="name" id="name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control border-top-0 border-right-0 border-left-0"
                                                    name="number" id="number" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <input type="email"
                                                    class="form-control border-top-0 border-right-0 border-left-0"
                                                    name="email" id="email" placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <div class="form-group mb-0">
                                                <textarea name="message"
                                                    class="form-control mb-0 border-top-0 border-right-0 border-left-0"
                                                    id="message" cols="30" rows="10"
                                                    placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-5 mb-0">
                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn medilife-btn">Make an Appointment
                                                    <span>+</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="medilife-contact-info">
                                <!-- Single Contact Info -->
                                <div class="single-contact-info mb-30">
                                    <img src="medical/img/icons/alarm-clock.png" alt="">
                                    <p>Mon - Sat 08:00 - 21:00 <br>Sunday CLOSED</p>
                                </div>
                                <!-- Single Contact Info -->
                                <div class="single-contact-info mb-30">
                                    <img src="medical/img/icons/envelope.png" alt="">
                                    <p>0080 673 729 766 <br>contact@business.com</p>
                                </div>
                                <!-- Single Contact Info -->
                                <div class="single-contact-info">
                                    <img src="medical/img/icons/map-pin.png" alt="">
                                    <p>Lamas Str, no 14-18 <br>41770 Miami</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
<!-- ***** Book An Appoinment Area End ***** -->

<!-- ***** About Us Area Start ***** -->
<section class="medica-about-us-area section-padding-100-20">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="medica-about-content">
                    <h2>We always put our pacients first</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet,
                        consectetuer adipiscing eli.</p>
                    <a href="#" class="btn medilife-btn mt-50">View the services <span>+</span></a>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="row">
                    <!-- Single Service Area -->
                    <div class="col-12 col-sm-6">
                        <div class="single-service-area d-flex">
                            <div class="service-icon">
                                <i class="icon-doctor"></i>
                            </div>
                            <div class="service-content">
                                <h5>The Best Doctors</h5>
                                <p>Lorem ipsum dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Service Area -->
                    <div class="col-12 col-sm-6">
                        <div class="single-service-area d-flex">
                            <div class="service-icon">
                                <i class="icon-blood-donation-1"></i>
                            </div>
                            <div class="service-content">
                                <h5>Baby Nursery</h5>
                                <p>Dolor sit amet, consecte tuer elit, sed diam nonummy nibh euismod tincidunt ut
                                    ldolore magna.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Service Area -->
                    <div class="col-12 col-sm-6">
                        <div class="single-service-area d-flex">
                            <div class="service-icon">
                                <i class="icon-flask-2"></i>
                            </div>
                            <div class="service-content">
                                <h5>Laboratory</h5>
                                <p>Lorem ipsum dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Service Area -->
                    <div class="col-12 col-sm-6">
                        <div class="single-service-area d-flex">
                            <div class="service-icon">
                                <i class="icon-emergency-call-1"></i>
                            </div>
                            <div class="service-content">
                                <h5>Emergency Room</h5>
                                <p>Dolor sit amet, consecte tuer elit, sed diam nonummy nibh euismod tincidunt ut
                                    ldolore magna.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** About Us Area End ***** -->

<!-- ***** Cool Facts Area Start ***** -->
<section class="medilife-cool-facts-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Single Cool Fact-->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-fact-area text-center mb-100">
                    <i class="icon-blood-transfusion-2"></i>
                    <h2><span class="counter">5632</span></h2>
                    <h6>Blood donations</h6>
                    <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                </div>
            </div>
            <!-- Single Cool Fact-->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-fact-area text-center mb-100">
                    <i class="icon-atoms"></i>
                    <h2><span class="counter">23</span>k</h2>
                    <h6>Pacients</h6>
                    <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                </div>
            </div>
            <!-- Single Cool Fact-->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-fact-area text-center mb-100">
                    <i class="icon-microscope"></i>
                    <h2><span class="counter">25</span></h2>
                    <h6>Specialities</h6>
                    <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                </div>
            </div>
            <!-- Single Cool Fact-->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-cool-fact-area text-center mb-100">
                    <i class="icon-doctor-1"></i>
                    <h2><span class="counter">723</span></h2>
                    <h6>Doctors</h6>
                    <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Cool Facts Area End ***** -->

<!-- ***** Gallery Area Start ***** -->
<div class="medilife-gallery-area owl-carousel">
    <!-- Single Gallery Item -->
    <div class="single-gallery-item">
        <img src="medical/img/bg-img/g1.jpg" alt="">
        <div class="view-more-btn">
            <a href=medical/img/bg-img/g1.jpg" class="btn gallery-img">See More +</a>
        </div>
    </div>
    <!-- Single Gallery Item -->
    <div class="single-gallery-item">
        <img src="medical/img/bg-img/g2.jpg" alt="">
        <div class="view-more-btn">
            <a href=medical/img/bg-img/g2.jpg" class="btn gallery-img">See More +</a>
        </div>
    </div>
    <!-- Single Gallery Item -->
    <div class="single-gallery-item">
        <img src="medical/img/bg-img/g3.jpg" alt="">
        <div class="view-more-btn">
            <a href=medical/img/bg-img/g3.jpg" class="btn gallery-img">See More +</a>
        </div>
    </div>

    <!-- Single Gallery Item -->
    <div class="single-gallery-item">
        <img src="medical/img/bg-img/g4.jpg" alt="">
        <div class="view-more-btn">
            <a href=medical/img/bg-img/g4.jpg" class="btn gallery-img">See More +</a>
        </div>
    </div>
</div>
<!-- ***** Gallery Area End ***** -->

<!-- ***** Features Area Start ***** -->
<div class="medilife-features-area section-padding-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="features-content">
                    <h2>A new way to treat pacients in a revolutionary facility</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                        tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet,
                        consectetuer adipiscing eli.Lorem ipsum dolor sit amet, consec tetuer adipiscing elit, sed
                        diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem
                        ipsum dolor sit amet, consectetuer.</p>
                    <a href="#" class="btn medilife-btn mt-50">View the services <span>+</span></a>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="features-thumbnail">
                    <img src="medical/img/bg-img/medical1.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Features Area End ***** -->

<!-- ***** Blog Area Start ***** -->
<div class="medilife-blog-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Single Blog Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-area mb-100">
                    <!-- Post Thumbnail -->
                    <div class="blog-post-thumbnail">
                        <img src="medical/img/blog-img/1.jpg" alt="">
                        <!-- Post Date -->
                        <div class="post-date">
                            <a href="#">Jan 23, 2018</a>
                        </div>
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                        <div class="post-author">
                            <a href="#"><img src="medical/img/blog-img/p1.jpg" alt=""></a>
                        </div>
                        <a href="#" class="headline">New drog release soon</a>
                        <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.
                        </p>
                        <a href="#" class="comments">3 Comments</a>
                    </div>
                </div>
            </div>
            <!-- Single Blog Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-area mb-100">
                    <!-- Post Thumbnail -->
                    <div class="blog-post-thumbnail">
                        <img src="medical/img/blog-img/2.jpg" alt="">
                        <!-- Post Date -->
                        <div class="post-date">
                            <a href="#">Jan 23, 2018</a>
                        </div>
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                        <div class="post-author">
                            <a href="#"><img src="medical/img/blog-img/p2.jpg" alt=""></a>
                        </div>
                        <a href="#" class="headline">Free dental care</a>
                        <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.
                        </p>
                        <a href="#" class="comments">3 Comments</a>
                    </div>
                </div>
            </div>
            <!-- Single Blog Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-area mb-100">
                    <!-- Post Thumbnail -->
                    <div class="blog-post-thumbnail">
                        <img src="medical/img/blog-img/3.jpg" alt="">
                        <!-- Post Date -->
                        <div class="post-date">
                            <a href="#">Jan 23, 2018</a>
                        </div>
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                        <div class="post-author">
                            <a href="#"><img src="medical/img/blog-img/p3.jpg" alt=""></a>
                        </div>
                        <a href="#" class="headline">Good news for the pacients</a>
                        <p>Dolor sit amet, consecte tuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.
                        </p>
                        <a href="#" class="comments">3 Comments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Blog Area End ***** -->

<!-- ***** Emergency Area Start ***** -->
<div class="medilife-emergency-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="emergency-content">
                    <i class="icon-smartphone"></i>
                    <h2>For Emergency calls</h2>
                    <h3>+12-823-611-8721</h3>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    <!-- Single Emergency Helpline -->
                    <div class="col-12 col-sm-6">
                        <div class="single-emergency-helpline mb-50">
                            <h5>London</h5>
                            <p>0080 673 729 766 <br> contact@business.com <br> Lamas Str, no 14-18 <br> 41770 Miami
                            </p>
                        </div>
                    </div>
                    <!-- Single Emergency Helpline -->
                    <div class="col-12 col-sm-6">
                        <div class="single-emergency-helpline mb-50">
                            <h5>New Castle</h5>
                            <p>0080 673 729 766 <br> contact@business.com <br> Lamas Str, no 14-18 <br> 41770 Miami
                            </p>
                        </div>
                    </div>
                    <!-- Single Emergency Helpline -->
                    <div class="col-12 col-sm-6">
                        <div class="single-emergency-helpline mb-50">
                            <h5>Manchester</h5>
                            <p>0080 673 729 766 <br> contact@business.com <br> Lamas Str, no 14-18 <br> 41770 Miami
                            </p>
                        </div>
                    </div>
                    <!-- Single Emergency Helpline -->
                    <div class="col-12 col-sm-6">
                        <div class="single-emergency-helpline mb-50">
                            <h5>Bristol</h5>
                            <p>0080 673 729 766 <br> contact@business.com <br> Lamas Str, no 14-18 <br> 41770 Miami
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Emergency Area End ***** -->
@endsection
