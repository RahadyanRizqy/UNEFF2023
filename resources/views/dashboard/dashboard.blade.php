@extends('master')

@section('title', 'Dashboard')

@section('content')
<h1>Success</h1>
<a href="{{ route('admin.logout') }}">Logout</a>
@endsection