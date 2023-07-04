@extends('master')

@php
    $title = 'Dashboard | ' . ucfirst($child)
@endphp

@push('style')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/spur.css') }}">
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<script src="{{ asset('js/chart-js-config.js') }}"></script>
@endpush

@section('title', $title)

@section('content')
<div class="dash">
    <div class="dash-nav dash-nav-dark">
        <header>
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            <a href="{{ route('dashboard.child', 'main') }}" class="spur-logo">

                    <img src="{{ asset('image/unefflogo2.png') }}" alt="" width="35%">
                    {{-- <i class="fas fa-bolt"></i> --}}
                    <span>UNEFF 2023</span>
            </a>
        </header>
        <nav class="dash-nav-list">
            <a href="{{ route('dashboard.child', 'main') }}" class="dash-nav-item">
                <i class="fas fa-home"></i> Dashboard 
            </a>
            <a href="{{ route('dashboard.child', 'posts') }}" class="dash-nav-item">
                <i class="fa-solid fa-newspaper"></i> Berita 
            </a>
            <a href="{{ route('dashboard.child', 'rules') }}" class="dash-nav-item">
                <i class="fa-regular fa-clipboard"></i> Persyaratan 
            </a>
            <a href="{{ route('dashboard.child', 'profile') }}" class="dash-nav-item">
                <i class="fa-regular fa-id-card"></i> Profil
            </a>
            <a href="{{ route('admin.logout') }}" class="dash-nav-item">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
            </a>
        </nav>
    </div>
    <div class="dash-app">
        <header class="dash-toolbar">
            <a href="#!" class="menu-toggle">
                <i class="fas fa-bars"></i>
            </a>
            @if ($child == 'posts')
            <h3 class="title-desc">Pemberitaan</h3>
            @elseif ($child == 'rules')
            <h3 class="title-desc">Persyaratan dan Peraturan</h3>
            @elseif ($child == 'profile')
            <h3 class="title-desc">Profil Admin</h3>
            @elseif ($child == 'add-post')
            <h3 class="title-desc">Penambahan Berita</h3>
            @else
            <h3 class="title-desc">Dashboard Utama</h3>
            @endif
            <div class="tools d-flex flex-column align-items-center">
                <i class="fa-solid fa-circle-user"></i>
                <p class="mb-0">{{ Auth::user()->username }}</p>
            </div>
        </header>
        @if($child)
            @include('template/child/'.$child)
        @endif
    </div>
</div>
{{-- <h1>Unej Film Festival 2023</h1>
<ul>
    <li>
        <a href="{{ route('dashboard.child', 'main') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('dashboard.child', 'profile') }}">Profile</a>
    </li>
    <li>
        <a href="{{ route('dashboard.child', 'posts') }}">Posts</a>
    </li>
    <li>
        <a href="{{ route('dashboard.child', 'rules') }}">Rules</a>
    </li>
    <li>
        <a href="{{ route('admin.logout') }}">Logout</a>
    </li>
</ul> --}}
@push('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="{{ asset('/js/spur.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@endsection