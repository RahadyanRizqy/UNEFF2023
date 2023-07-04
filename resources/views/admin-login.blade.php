@extends('master')

@push('csrf-token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('style')
<link rel="stylesheet" href="{{ asset('css/admin-login.css') }}">
@endpush

@section('title', 'Admin Login')

@section('content')
<div class="container">
    <div class="wrapper">
        <div class="title">
            <img src="{{ asset('image/unefflogo.png') }}" alt="" width="25%" height="auto">
            <span class="px-2">Admin Login</span>
        </div>
        <div class="warning-container">
            @if($errors->any())
            <div class="warning d-block mt-3 py-3">
                @if ($errors->first('username'))
                <ul id="errorList"><li>{{ $errors->first('username') }}</li></ul>
                @elseif ($errors->first('password'))
                <ul id="errorList"><li>{{ $errors->first('password') }}</li></ul>
                @endif
            </div>
            @else
            <div class="warning mt-3 py-3">
                <ul id="errorList"></ul>
            </div>
            @endif
        </div>
        <form id="loginForm" action="{{ route('admin.check') }}" method="post">
            @csrf
            <div class="row">
                <i class="fa-solid fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Masukkan username">
            </div>
            <div class="row">
                <i class="fa-solid fa-key"></i>
                <input type="password" id="password" name="password" placeholder="Masukkan Password">
                <div>
                    <i id="password-lock" class="fa-regular fa-eye-slash"></i>
                </div>
            </div>
            <div>
                <div class="row button">
                    <button type="submit" id="btn-login">Login</button>
                </div>
                <div class="signup-link"><a href="https://wa.me/6288804897436">Lupa password?</a></div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('/js/admin-login.js') }}"></script>
@endpush