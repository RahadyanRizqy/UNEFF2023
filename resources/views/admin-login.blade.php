@extends('master')

@push('csrf-token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('title', 'Admin Login')

@section('content')
<h1>Admin Login</h1>
{{-- <form action="/admin-login" method="post">
    @csrf --}}
    <div class="form-group">
        <label>User</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
    </div>
    <p id="loginError" style="color: red"></p>
    <button class="btn btn-primary" id="btn-login">Login</button>
{{-- </form> --}}
@endsection

@push('script')
<script src="{{ asset('/js/admin-login.js') }}"></script>
@endpush