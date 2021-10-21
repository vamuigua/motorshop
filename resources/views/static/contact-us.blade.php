@extends('layouts.headfoot')
@section('content')
<!-- Page Content -->
<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Contact Us</h1>
        <span>feel free to send us a message now!</span>
      </div>
    </div>
  </div>
</div>

<div class="contact-information">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="contact-item">
          <i class="fa fa-phone"></i>
          <h4>Phone</h4>
          <p>You can reach out to us by using any of the mobile numbers below.</p>
          <a>+254720720256</a>
          <a>+254725249932</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item">
          <i class="fa fa-envelope"></i>
          <h4>Email</h4>
          <p>We also have a mailing contact that you can use to reach out to us!</p>
          <a href="mailto:gemvist@gmail.com" target="_blank">gemvist@gmail.com</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item">
          <i class="fa fa-map-marker "></i>
          <h4>Location</h4>
          <p>Motorshop Dealers, Kiambu Road<br> Kenya &#x1F1F0;&#x1F1EA;</p>
          <a href="https://g.page/motorshop-dealers-ltd?share" target="_blank">View on Google Maps</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="callback-form contact-us">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Send us a <em>message</em></h2>
          <span>Got a Question? We'd love to hear from you. Send us a message and we'll respond as soon as
            possible.</span>
        </div>
      </div>
      <div class="col-md-12">
        <div class="contact-form">
          <form id="contact" action="https://formspree.io/f/mgervrgw" method="POST">
            <div class="row">
              <div class="col-lg-4 col-md-12 col-sm-12">
                <fieldset>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                </fieldset>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12">
                <fieldset>
                  <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*"
                    placeholder="E-Mail Address" required="">
                </fieldset>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12">
                <fieldset>
                  <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message"
                    required=""></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="map">
  <!-- How to change your own map point
      1. Go to Google Maps
      2. Click on your location point
      3. Click "Share" and choose "Embed map" tab
      4. Copy only URL and paste it within the src="" field below
  -->
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.647871697594!2d36.8352929!3d-1.2212873!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x95b3618a25d83bab!2sMotorshop%20Dealers%20LTD!5e0!3m2!1sen!2ske!4v1620650399809!5m2!1sen!2ske"
    width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>


@endsection