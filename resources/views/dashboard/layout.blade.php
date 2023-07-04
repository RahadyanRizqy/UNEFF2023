@extends('master')

@php
    $title = 'Dashboard | ' . ucfirst($child)
@endphp

@section('title', $title)

@section('content')
<h1>Unej Film Festival 2023</h1>
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
</ul>
@if($child)
    @include('dashboard/child/'.$child)
@else
    @include('dashboard/child/main')
@endif
@endsection