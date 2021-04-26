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
          <p>Here is a way of contacting us.The Number below is directly linked to our customer service team official , who also handle Sales inquires and problems.</p>
          <a href="#">+1 333 4040 5566</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item">
          <i class="fa fa-envelope"></i>
          <h4>Email</h4>
          <p>Here is another way of contacting us.The Email below is directly linked to our customer service team , who also handle Sales inquires and problems .</p>
          <a href="#">gemvist@gmail.com</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item">
          <i class="fa fa-map-marker "></i>
          <h4>Location</h4>
          <p>Ongata Rongai <br> Kenya &#x1F1F0;&#x1F1EA;</p>
          <a href="https://goo.gl/maps/eyDhTEKJzgp9NVto6">View on Google Maps</a>
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
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63818.14427392165!2d36.71402879026963!3d-1.3960573807360421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f05cf50f94e8d%3A0x51c29656e6fd8ca9!2sOngata%20Rongai!5e0!3m2!1sen!2ske!4v1619443200211!5m2!1sen!2ske"
    width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen loading="lazy" ></iframe>
</div>


@endsection