@extends('layouts.headfoot')
@section('content')
<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>About Us</h1>
        <span>We have over 20 years of experience</span>
      </div>
    </div>
  </div>
</div>

<div class="more-info about-info">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="more-info-content">
          <div class="row">
            <div class="col-md-6 align-self-center">
              <div class="right-content">
                <span>Who are we &#x2753;</span>
                <h2>Get to know about <em>our company</em></h2>
                <p>Here at {{config('app.name')}} we deal with, all brands, makes & models of cars. We fame
                  ourselves with providing the best cars in the market both used and new.
                  We have over <b>20 Years</b> experience in the car dealership market, and have been marked
                  among the best corporations in Kenya &#x1F3C5; .</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="left-image">
                <img src="{{ asset('images/blog-image-3-940x460.jpg') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fun-facts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <h1><b>We got your ride!</b></h1>
        </div>
      </div>
      <div class="col-md-12 align-self-center">
        <div class="row">
          <div class="col-md-6">
            <div class="count-area-content">
              <div class="count-digit">100000</div>
              <div class="count-title">Miles driven</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="count-area-content">
              <div class="count-digit">1280</div>
              <div class="count-title">Happy clients</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="count-area-content">
              <div class="count-digit">3</div>
              <div class="count-title">Cities</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="count-area-content">
              <div class="count-digit">26</div>
              <div class="count-title">Cars</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection