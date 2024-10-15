@extends('layouts.app')

@section('content')
<div class="container-fluid py-3 mb-4 hero-header mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h2 class="text-primary">Seller Request Form</h2>
            <form action="{{ route('seller.request.create') }}" method="POST">
                @csrf
                <input hidden type="text" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <label for="name">Fullname</label>
                    <input type="text" name="name" class="form-control" placeholder=" John Doe" required>
                </div>

                <div class="form-group">
                    <label for="store">Store Name</label>
                    <input type="text" name="store" class="form-control" placeholder="Doe Store" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Phnom Penh, Cambodia" required>
                </div>
                <div class="form-group">
                    <label for="phone">Fullname</label>
                    <input type="text" name="phone" class="form-control" placeholder="+855 172 345 67" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="mt-2">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
