<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RS Sehat') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="shortcut icon" href="{{ asset('images/logo2.png') }}" type="image/x-icon" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('css/versions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
    <script src="{{ asset('js/modernizer.js') }}"></script>
    
    @livewireStyles
</head>

<body class="clinic_version">

    <div id="preloader">
        <a href="{{ url('/') }}"><img class="preloader" src="{{ asset('images/loaders/heart-loading2.gif') }}" alt="Loading..."></a>
    </div>
    
    <header>
        <div class="header-top wow fadeIn">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo3.png') }}" alt="logo image"></a>
                <div class="right-header">
                    <div class="header-info">
                        <div class="info-inner">
                            <span class="icontop"><img src="{{ asset('images/phone-icon.png') }}" alt="#"></span>
                            <span class="iconcont"><a href="#">123 456 7890</a></span>
                        </div>
                        <div class="info-inner">
                            <span class="icontop"><img src="{{ asset('images/email-icon.png') }}" alt="#"></span>
                            <span class="iconcont"><a href="#">admin@hospital.com</a></span>
                        </div>
                        <div class="info-inner">
                            <span class="icontop"><img src="{{ asset('images/clock-icon.png') }}" alt="#"></i></span>
                            <span class="iconcont"><a href="#">08:00 - 20:00</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom wow fadeIn">
            <div class="container-fluid">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                            <li><a href="{{ url('/services') }}">Layanan</a></li>
                            <li><a href="{{ url('/#doctors') }}">Dokter</a></li>
                            <li><a href="{{ url('/#getintouch') }}">Kontak</a></li>
                            
                            @auth
                                @if (auth()->user()->is_super_admin)
                                    <li><a href="{{ route('admin_dashboard') }}">Admin Area</a></li>
                                @else
                                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                                @endif
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <a href="#home" data-scroll class="dmtop global-radius" style="padding: 0; display: flex; align-items: center; justify-content: center;">
        <img src="{{ asset('images/top.png') }}" alt="Up" style="width: 30px; height: auto;">
    </a>

    <footer id="footer" class="footer-area wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo padding">
                        <a href="{{ url('/') }}"><img src="{{ asset('images/logo3.png') }}" alt=""></a>
                        <p>Sistem Manajemen Rumah Sakit Modern. Memberikan pelayanan kesehatan terbaik dengan prioritas keselamatan pasien.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-info padding">
                        <h3>KONTAK KAMI</h3>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> Jember, Jawa Timur, Indonesia</p>
                        <p><i class="fa fa-paper-plane" aria-hidden="true"></i> admin@hospital.com</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> 123 456 7890</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-info padding">
                        <h3>SOSIAL MEDIA</h3>
                        <p>Ikuti kami untuk update terbaru.</p>
                        <div class="social">
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright-area wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="footer-text">
                        <p>&copy; {{ date('Y') }} {{ config('app.name') }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="{{ asset('js/all-in-one.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        function check_active(d) {
            document.getElementById(d).addAttribute('class', 'active');
        }
    </script>
</body>
</html>