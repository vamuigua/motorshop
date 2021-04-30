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
                    <h6>A Wide Variety of Vehicles Available for Sale!</h6>
                    <h4>WELCOME TO <br> {{config('app.name')}} </h4>
                    <p style="font-size:0.895em">Here at {{config('app.name')}} we offer all the best prices on all
                        available cars and car brands. We pride ourselves in best quality at affordable prices, customer
                        service and also
                        legal expertise. To view some of our machines click on the <b>cars</b> link below.
                    </p>
                    <a href="{{ route('cars') }}" class="filled-button">Cars</a>
                </div>
            </div>
        </div>
        <!-- // Item -->
        <!-- Item -->
        <div class="item item-2">
            <div class="img-fill">
                <div class="text-content">
                    <h6>Karibu to {{config('app.name')}}!</h6>
                    <h4>WELCOME TO <br> {{config('app.name')}}</h4>
                    <p>We deal with, all brands, makes & models of cars. We fame ourselves with providing the best cars
                        in the market both used and new. We have over <b>20 Years</b> experience in the car dealership
                        market, and have been marked among the best corporations in Kenya &#x1F3C5;</p>
                    <a href="{{ route('about') }}" class="filled-button">About Us</a>
                </div>
            </div>
        </div>
        <!-- // Item -->
        <!-- Item -->
        <div class="item item-3">
            <div class="img-fill">
                <div class="text-content">
                    <h6>Karibu to {{config('app.name')}}!</h6>
                    <h4>WELCOME TO <br> GEMVIST MOTORSHOP CORPORATION </h4>
                    <p>We are located in Kajiado County, in the district of Ongata Rongai, Kenya &#x1F1F0;&#x1F1EA;</p>
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
                <span>Click on the <b>Contact Us </b> button to view our contact details. Thank you &#x1F600;</span>
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
                    <span>Buy a car today!</span>
                </div>
            </div>
            @foreach ($cars as $car)
            <div class="col-md-4">
                <div class="service-item">
                    @if (count($car->images()) > 0)
                    <img src="{{$car->images()[0]->getUrl()}}" class="img-fluid" alt="car image">
                    @else
                    <div class="col-sm-9">
                        <div class="d-flex justify-content-center">
                            <img src="/images/no-image-available.png" class="img-fluid" alt="no-image-available.png">
                        </div>
                    </div>
                    @endif
                    <div class="down-content">
                        <h4>{{ $car->carMake($car->car_make_id)->name}} {{$car->carModel($car->car_model_id)->name}}
                        </h4>
                        <div style="margin-bottom:10px;">
                            <span>
                                {{ number_format($car->price) }}.KSH
                            </span>
                        </div>

                        <p>
                            <i class="fa fa-dashboard"></i> 1{{ number_format($car->mileage) }} km &nbsp;&nbsp;&nbsp;
                            <br>
                            <i class="fa fa-cube"></i> {{ number_format($car->engine_size) }} cc &nbsp;&nbsp;&nbsp;
                            <br>
                            <i class="fa fa-cog"></i> {{ $car->transmission_type }} &nbsp;&nbsp;&nbsp;
                        </p>
                        <a href="{{ route('car-details', ['id' => $car->id]) }}" class="filled-button">View More</a>
                    </div>
                </div>

                <br>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ route('cars') }}" class="btn btn-primary btn-lg btn-block">Checkout more Cars!</a>
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
                        <p>Here at {{config('app.name')}} we deal with, all brands, makes & models of cars. We fame
                            ourselves with providing the best cars in the market both used and new.
                            We have over <b>20 Years</b> experience in the car dealership market, and have been marked
                            among the best corporations in Kenya &#x1F3C5; .</p>
                        <a href="{{ route('about') }}" class="filled-button">Read More</a>
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
                    <span>Please write us a Message and we will respond in the shortest time possible.</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form">
                    <form id="contact" action="https://formspree.io/f/mgervrgw" method="post">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="email" class="form-control" id="email"
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