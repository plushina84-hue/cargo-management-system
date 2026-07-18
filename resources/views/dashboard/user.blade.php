@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold">Welcome {{ auth()->user()->name }}</h2>
    <p class="text-muted">You are logged in successfully.</p>
</div>

<a href="{{ route('tracking') }}" class="btn btn-primary">
    <i class="bi bi-geo-alt"></i>
    Go to Tracking Services
</a>

@endsection
