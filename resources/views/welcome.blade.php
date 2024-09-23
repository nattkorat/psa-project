@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1050;">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container">
    <h1 class="text-primary">
        This is the welcome page.
    </h1>
</div>

@endsection
