@extends('layout')

@push('csrf-token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('style')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('title', 'Unej Film Festival 2023')
    
@section('content')
<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
    <div class="container-fluid p-0">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="image/banner-event.png" alt="logo" width="130" height="auto">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-toggle="dropdown">Beranda<span>/</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Juri<span>/</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown">Profil<span>/</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('news.index') }}" data-toggle="dropdown">Berita</a>
                </li>
            </ul>
            <a href="#" class="ticket">
                <img src="images/icon/ticket.png" alt="ticket">
                <span>Daftarkan Karya</span>
            </a>
        </div>
    </div>
</nav>
@if (session()->has('child'))
    @if($child)
        @include('general/child/'.$child)
    @else
        @include('general/child/home')
    @endif
@else
    @include('general/child/home')
@endif
  
<!--====  End of Navigation Section  ====-->
  
  

</footer>
  <!-- Subfooter -->
  <footer class="subfooter">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center">
          <div class="copyright-text">
            <p><a href="index.html">Eventre</a> &copy; 2021, Designed &amp; Developed by <a href="https://www.linkedin.com/in/rahadyan-rizqy/">Rahadyan Rizqy</a></p>
          </div>
        </div>
        <div class="col-md-6">
          <a href="#" class="to-top"><i class="fa fa-angle-up"></i></a>
        </div>
      </div>
    </div>
</footer>
  
  

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
@endpush