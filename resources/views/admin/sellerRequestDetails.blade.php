@extends('layouts.admin')

@section('content')
    <h1 class="text-primary">User Request Details</h1>
    <hr>

    <form class="row g-3">
        <div class="col-md-6">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" value="{{ $user->name}}">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" value="{{ $user->address }}">
        </div>
        <div class="col-12">
            <label for="store" class="form-label">Store Name</label>
            <input type="text" class="form-control"  value="{{ $user->store }}">
        </div>
        <div class="col-12">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" value="{{ $user->phone }}">
        </div>
        <div class="col-12">
            <label for="request_date" class="form-label">Requested Date</label>
            <input type="text" class="form-control" value="{{ $user->created_at }}">
        </div>
        
        <div class="col-4">
        <a href="{{ route('admin.seller.request.accept', $user->id) }}" class="btn btn-primary">Accept</a>
            <a href="{{ route('admin.seller.request.reject', $user->id) }}" class="btn btn-danger">Reject</a>
        </div>
    </form>

@endsection