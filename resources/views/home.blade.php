<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <title>{{ config('app.name') }}</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/owl.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="left-info">
                        <li><a href="#"><i class="fa fa-envelope"></i>info@motorshop.com</a></li>
                        <li><a href="#"><i class="fas fa-phone-alt"></i>123-456-7890</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="right-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h2>{{ config('app.name') }}<em> Website</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span style="color: #A4C639"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cars</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">About</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">About Us</a>
                                <a class="dropdown-item" href="#">Blog</a>
                                <a class="dropdown-item" href="#">Team</a>
                                <a class="dropdown-item" href="#">Testimonials</a>
                                <a class="dropdown-item" href="#">FAQ</a>
                                <a class="dropdown-item" href="#">Terms</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

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
                        <a href="#" class="filled-button">Cars</a>
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
                        <a href="#" class="filled-button">About Us</a>
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
                        <a href="#" class="filled-button">Contact Us</a>
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
                    <a href="contact.html" class="border-button">Contact Us</a>
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

    <div class="more-info">
        <div class="container">
            <div class="section-heading">
                <h2>Read our <em>Blog</em></h2>
                <span>Aliquam id urna imperdiet libero mollis hendrerit</span>
            </div>

            <div class="row" id="tabs">
                <div class="col-md-4">
                    <ul>
                        <li><a href='#tabs-1'>Lorem ipsum dolor sit amet, consectetur adipisicing <br> <small>John Doe
                                    &nbsp;|&nbsp;
                                    27.07.2020 10:10</small></a></li>
                        <li><a href='#tabs-2'>Mauris lobortis quam id dictum dignissim <br> <small>John Doe
                                    &nbsp;|&nbsp; 27.07.2020
                                    10:10</small></a></li>
                        <li><a href='#tabs-3'>Class aptent taciti sociosqu ad litora torquent per <br> <small>John Doe
                                    &nbsp;|&nbsp;
                                    27.07.2020 10:10</small></a></li>
                    </ul>

                    <br>

                    <div class="text-center">
                        <a href="blog.html" class="filled-button">Read More</a>
                    </div>

                    <br>
                </div>

                <div class="col-md-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="assets/images/blog-image-1-940x460.jpg" alt="">
                            <h4><a href="blog-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing.</a>
                            </h4>
                            <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in,
                                tincidunt vel
                                diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo mauris ante, quis
                                posuere nibh
                                vestibulum sit amet.</p>
                        </article>
                        <article id='tabs-2'>
                            <img src="assets/images/blog-image-2-940x460.jpg" alt="">
                            <h4><a href="blog-details.html">Mauris lobortis quam id dictum dignissim</a></h4>
                            <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in,
                                tincidunt vel
                                diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo mauris ante, quis
                                posuere nibh
                                vestibulum sit amet</p>
                        </article>
                        <article id='tabs-3'>
                            <img src="assets/images/blog-image-3-940x460.jpg" alt="">
                            <h4><a href="blog-details.html">Class aptent taciti sociosqu ad litora torquent per</a></h4>
                            <p>Mauris lobortis quam id dictum dignissim. Donec pellentesque erat dolor, cursus dapibus
                                turpis
                                hendrerit quis. Suspendisse at suscipit arcu. Nulla sed erat lectus. Nulla facilisi. In
                                sit amet neque
                                sapien. Donec scelerisque mi at gravida efficitur. Nunc lacinia a est eu malesuada.
                                Curabitur eleifend
                                elit sapien, sed pulvinar orci luctus eget.
                            </p>
                        </article>
                    </section>
                </div>
            </div>


        </div>
    </div>

    <div class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>What they say <em>about us</em></h2>
                        <span>testimonials from our greatest clients</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-testimonials owl-carousel">

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>George Walker</h4>
                                <span>Chief Financial Analyst</span>
                                <p>"Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet
                                    malesuada justo
                                    sem sit amet quam. Pellentesque in sagittis lacus."</p>
                            </div>
                            <img src="http://placehold.it/60x60" alt="">
                        </div>

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>John Smith</h4>
                                <span>Market Specialist</span>
                                <p>"In eget leo ante. Sed nibh leo, laoreet accumsan euismod quis, scelerisque a nunc.
                                    Mauris accumsan,
                                    arcu id ornare malesuada, est nulla luctus nisi."</p>
                            </div>
                            <img src="http://placehold.it/60x60" alt="">
                        </div>

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>David Wood</h4>
                                <span>Chief Accountant</span>
                                <p>"Ut ultricies maximus turpis, in sollicitudin ligula posuere vel. Donec finibus
                                    maximus neque, vitae
                                    egestas quam imperdiet nec. Proin nec mauris eu tortor consectetur tristique."</p>
                            </div>
                            <img src="http://placehold.it/60x60" alt="">
                        </div>

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>Andrew Boom</h4>
                                <span>Marketing Head</span>
                                <p>"Curabitur sollicitudin, tortor at suscipit volutpat, nisi arcu aliquet dui, vitae
                                    semper sem turpis
                                    quis libero. Quisque vulputate lacinia nisl ac lobortis."</p>
                            </div>
                            <img src="http://placehold.it/60x60" alt="">
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

    <!-- Footer Starts Here -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-item">
                    <h4>Car Dealer Website</h4>
                    <p>Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien
                        vitae.</p>
                    <ul class="social-icons">
                        <li><a rel="nofollow" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-item">
                    <h4>Useful Links</h4>
                    <ul class="menu-list">
                        <li><a href="#">Vivamus ut tellus mi</a></li>
                        <li><a href="#">Nulla nec cursus elit</a></li>
                        <li><a href="#">Vulputate sed nec</a></li>
                        <li><a href="#">Cursus augue hasellus</a></li>
                        <li><a href="#">Lacinia ac sapien</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-item">
                    <h4>Additional Pages</h4>
                    <ul class="menu-list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-item last-item">
                    <h4>Contact Us</h4>
                    <div class="contact-form">
                        <form id="contact footer-contact" action="" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Full Name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control" id="email"
                                            pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
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
                                        <button type="submit" id="form-submit" class="filled-button">Send
                                            Message</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Copyright © <script>
                            document.write(new Date().getFullYear());
                        </script> {{ config('app.name') }}
                        - Designed & Built with ❣</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- JQuery --}}
    <script src="/assets/js/jquery.min.js"></script>

    <!-- Additional Scripts -->
    <script src="/assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="/assets/js/slick.js"></script>
    <script src="/assets/js/accordions.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
      if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
      }
    }
    </script>

</body>

</html>