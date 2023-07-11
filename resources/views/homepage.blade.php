@extends('master')

@push('csrf-token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush


@push('style')
<link rel="stylesheet" href="{{ asset('css/admin-login.css') }}">
@endpush

@section('title', 'Unej Film Festival 2023')
    
@section('content')
<header>
    <nav>
    </nav>
</header>
<section>
<h1>Landing Page</h1>
</section>
<footer>
</footer>
@endsection