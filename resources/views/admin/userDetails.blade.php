@extends('layouts.admin')

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1050;">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="text-primary">User Details</h1>
    <hr>

    <form class="row g-3">
        <div class="col-md-6">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="name" value="{{ $user->name }}" disabled>
        </div>
        <div class="col-md-6">
            <label for="emial" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
        </div>
        <div class="col-12">
            <label for="join_date" class="form-label">Created At</label>
            <input type="datetime" class="form-control" id="datetime" placeholder="{{ $user->created_at}}" disabled>
        </div>
        <div class="col-12">
            <label for="modify" class="form-label">Modified At</label>
            <input type="datetime" class="form-control" id="modify" placeholder="{{$user->updated_at}}" disabled>
        </div>

        <div class="col-12">
            <label for="role" class="form-label">User Role</label>
            <input type="text" class="form-control" id="role" placeholder="{{$user->role}}" disabled>
        </div>
        
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit User</button>
        </div>
    </form>
   
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admim.user.update') }}" method="post">
                @csrf
                <input type="text" value="{{ $user->id }}" name="id" hidden>
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="name" value="{{ $user->name }}" disabled>
                
                <label for="emial" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                
                <label for="role">Role</label>
                <select name="role" id="userRole" class="form-select">
                    <option value="admin" {{ $user->role == "admin" ? "selected": ""}}> Admin</option>
                    <option value="seller" {{ $user->role == "seller" ? "selected": ""}}>Seller</option>
                    <option value="user" {{ $user->role == "user" ? "selected": ""}}>User</option>
                </select>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        </div>
    </div>

@endsection