@extends('layouts.headfoot')
@section('content')
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text" id="top">
    <div class="Modern-Slider">
        <!-- Item -->
        <div class="item item-1">
            <div class="img-fill">
                <div class="text-content">
                    <h6>lorem ipsum dolor sit amet!</h6>
                    <h4>Quam temporibus accusam <br> hic ducimus quia</h4>
                    <p>Magni deserunt dolorem consectetur adipisicing elit. Corporis molestiae optio, laudantium
                        odio quod rerum
                        maiores, omnis unde quae illo.</p>
                    <a href="{{ route('cars') }}" class="filled-button">Cars</a>
                </div>
            </div>
        </div>
        <!-- // Item -->
        <!-- Item -->
        <div class="item item-2">
            <div class="img-fill">
                <div class="text-content">
                    <h6>magni deserunt dolorem harum quas!</h6>
                    <h4>Aliquam iusto harum <br> ratione porro odio</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At culpa cupiditate mollitia
                        adipisci assumenda
                        laborum eius quae quo excepturi, eveniet. Dicta nulla ea beatae consequuntur?</p>
                    <a href="{{ route('about') }}" class="filled-button">About Us</a>
                </div>
            </div>
        </div>
        <!-- // Item -->
        <!-- Item -->
        <div class="item item-3">
            <div class="img-fill">
                <div class="text-content">
                    <h6>alias officia qui quae vitae natus!</h6>
                    <h4>Lorem ipsum dolor <br>sit amet, consectetur.</h4>
                    <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate mi. Sed nec cursus augue. Phasellus
                        lacinia ac
                        sapien vitae dapibus. Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</p>
                    <a href="{{ route('contact-us') }}" class="filled-button">Contact Us</a>
                </div>
            </div>
        </div>
        <!-- // Item -->
    </div>
</div>
<!-- Banner Ends Here -->

<div class="request-form">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>Request a call back right now ?</h4>
                <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
            </div>
            <div class="col-md-4">
                <a href="{{ route('contact-us') }}" class="border-button">Contact Us</a>
            </div>
        </div>
    </div>
</div>

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Featured <em>Cars</em></h2>
                    <span>Aliquam id urna imperdiet libero mollis hendrerit</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item">
                    <img src="assets/images/product-1-720x480.jpg" alt="">
                    <div class="down-content">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <div style="margin-bottom:10px;">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>
                        </div>

                        <p>
                            <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                        </p>
                        <a href="car-details.html" class="filled-button">View More</a>
                    </div>
                </div>

                <br>
            </div>
            <div class="col-md-4">
                <div class="service-item">
                    <img src="assets/images/product-2-720x480.jpg" alt="">
                    <div class="down-content">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <div style="margin-bottom:10px;">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>
                        </div>

                        <p>
                            <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                        </p>
                        <a href="car-details.html" class="filled-button">View More</a>
                    </div>
                </div>

                <br>
            </div>
            <div class="col-md-4">
                <div class="service-item">
                    <img src="assets/images/product-3-720x480.jpg" alt="">
                    <div class="down-content">
                        <h4>Lorem ipsum dolor sit amet</h4>
                        <div style="margin-bottom:10px;">
                            <span>
                                <del><sup>$</sup>11999 </del> &nbsp; <sup>$</sup>11779
                            </span>
                        </div>

                        <p>
                            <i class="fa fa-dashboard"></i> 130 000km &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cube"></i> 1800 cc &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-cog"></i> Manual &nbsp;&nbsp;&nbsp;
                        </p>
                        <a href="car-details.html" class="filled-button">View More</a>
                    </div>
                </div>

                <br>
            </div>
        </div>
    </div>
</div>

<div class="fun-facts">
    <div class="container">
        <div class="more-info-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-image">
                        <img src="assets/images/about-1-570x350.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="right-content">
                        <span>Who we are</span>
                        <h2>Get to know about <em>our company</em></h2>
                        <p>Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat
                            tellus nibh, id
                            molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus</p>
                        <a href="about.html" class="filled-button">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="callback-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Request a <em>call back</em></h2>
                    <span>Etiam suscipit ante a odio consequat</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="subject" type="text" class="form-control" id="subject"
                                        placeholder="Subject" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message"
                                        placeholder="Your Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="border-button">Send
                                        Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
    </div>
</div>
@endsection