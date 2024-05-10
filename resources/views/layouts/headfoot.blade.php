<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="{{ config('app.name') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body>
    <div id="app">
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
                            <li><a href="mailto:gemvist@gmail.com" target="_blank"><i
                                        class="fa fa-envelope"></i>gemvist@gmail.com</a>
                            </li>
                            <li><a href="tel:+254720720256"><i class="fa fa-phone"></i>+254720720256</a></li>
                            <li><a href="tel:+254725249932"><i class="fa fa-phone"></i>+254725249932</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="right-icons">
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="GEMVIST VENTURES LTD "><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="GEMVIST VENTURES LTD "><i
                                        class="fa fa-twitter"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="GEMVIST VENTURES LTD "><i
                                        class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="GEMVIST VENTURES LTD "><i
                                        class="fa fa-instagram"> </i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <header class="">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <h2>{{ config('app.name') }}</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cars') }}">Cars</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="{{ route('about') }}"
                                    role="button" aria-haspopup="true" aria-expanded="false">About</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('about') }}">About Us</a>
                                    <a class="dropdown-item" href="{{ route('faq') }}">FAQ</a>
                                    <a class="dropdown-item" href="{{ route('terms') }}">Terms</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                            </li>
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @endguest

                            @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->hasRole('Admin'))
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-0">
            @yield('content')
        </main>

        <!-- Footer Starts Here -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-item">
                        <h4>{{ config('app.name') }}</h4>
                        <p>We got your ride!</p>
                        <ul class="social-icons">
                            <li><a rel="nofollow" href="#" target="_blank" data-toggle="tooltip" data-placement="top"
                                    title="GEMVIST VENTURES LTD "><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="GEMVIST VENTURES LTD "><i
                                        class="fa fa-twitter"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="GEMVIST VENTURES LTD "><i
                                        class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="GEMVIST VENTURES LTD "><i
                                        class="fa fa-instagram"> </i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 footer-item">
                        <h4>Pages to explore</h4>
                        <ul class="menu-list justify-content-center">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('cars') }}">Cars</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                            <li><a href="{{ route('terms') }}">Terms</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 footer-item last-item">
                        <h4>Contact Us</h4>
                        <div class="contact-form">
                            <form id="contact footer-contact" action="https://formspree.io/f/mgervrgw" method="post">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="name" type="text" class="form-control" id="name_contact"
                                                placeholder="Full Name" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="email" type="email" class="form-control" id="email_contact"
                                                pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" rows="6" class="form-control" id="message_contact"
                                                placeholder="Your Message" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit_contact" class="filled-button">Send
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
                            Copyright © {{ now()->year }} {{ config('app.name') }}
                            - Designed & Built with ❣</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="/js/app.js" defer></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/accordions.js') }}"></script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t){                   //declaring the array outside of the
            if(! cleared[t.id]){                      // function makes it static and global
                cleared[t.id] = 1;  // you could use true and false, but that's more typing
                t.value='';         // with more chance of typos
                t.style.color='#fff';
            }
        }
    </script>

    {{-- Initialize all tooltips on the page --}}
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    @yield('scripts')
</body>

</html>