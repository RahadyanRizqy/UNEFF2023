@extends('layout')

@push('csrf-token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('style')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('title', 'UNEJ Film Festival 2023')
    
@section('content')
<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
    <div class="container-fluid p-0">
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="/image/banner-event.png" alt="logo" width="130" height="auto">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item" id="home">
                    <a class="nav-link" href="{{ url('/home') }}">Beranda<span>/</span></a>
                </li>
                <li class="nav-item" id="juries">
                    <a class="nav-link" href="{{ route('general.jury') }}">Juri<span>/</span></a>
                </li>
                {{-- <li class="nav-item" id="event">
                    <a class="nav-link" href="{{ route('general.event') }}">Acara<span>/</span></a>
                </li> --}}
                <li class="nav-item" id="news">
                    <a class="nav-link" href="{{ route('general.news') }}">Berita</a>
                </li>
            </ul>
            <a href="{{ route('general.submit_work') }}" class="ticket">
                <img src="/images/icon/ticket.png" alt="ticket">
                <span>Daftarkan Karya</span>
            </a>
        </div>
    </div>
</nav>
@if($child)
    @include('general/child/'.$child)
@else
    @include('general/child/home')
@endif
  
<!--====  End of Navigation Section  ====-->
  
<footer class="footer-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <div class="footer-logo">
                        <img src="image/profile.png" alt="logo" width="25%" height="auto">
                    </div>
                    <ul class="social-links-footer list-inline">
                        <li class="list-inline-item">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://wa.me/6288804897436/"><i class="fa fa-whatsapp"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/uneffjember/"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
  <!-- Subfooter -->
<div class="subfooter">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center">
          <div class="copyright-text">
            <p><a href="index.html"></a> &copy; 2021, Designed &amp; Developed by <a href="https://www.linkedin.com/in/rahadyan-rizqy/">Rahadyan Rizqy</a></p>
          </div>
        </div>
        <div class="col-md-6">
          <a href="#" class="to-top"><i class="fa fa-angle-up"></i></a>
        </div>
      </div>
    </div>
</div>
@endsection

@push('script')
    <!-- jQuey -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- Shuffle -->
    <script src="/plugins/shuffle/shuffle.min.js"></script>
    <!-- Magnific Popup -->
    <script src="/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Slick Carousel -->
    <script src="/plugins/slick/slick.min.js"></script>
    <!-- SyoTimer -->
    <script src="/plugins/syotimer/jquery.syotimer.min.js"></script>
    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"></script>
    <script src="/plugins/google-map/gmap.js"></script>
    <!-- Custom Script -->
    <script src="/js/script.js"></script>

    <script>
        $(document).ready(function () {
            var url = $(location).attr('href');
            if (url.includes('juries')) {
                console.log(url);
                $('#juries').addClass('active');
            }
            else if (url.includes('event')) {
                $('#event').addClass('active');
            }
            else if (url.includes('news')) {
                $('#news').addClass('active');
            }
            else if (url.includes('home')) {
                $('#home').addClass('active');
            }
        });
    </script>
@endpush