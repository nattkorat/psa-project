@extends('layouts.seller')

@section('content')
@if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1050;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif
    <h1 class="text-primary">Order List</h1>
    <hr>
    @if(count($orders) <= 0)
        <h3 class="text-danger text-center">No Order yet!</h3>
    @else
    <table class="table">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Number of Orders</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $user_id => $userOrders)
                    @php
                        $user = $userOrders->first()->user; // Get the user data from the first order
                        $orderCount = $userOrders->count(); // Total number of orders for the user
                    @endphp
                    <tr>
                        <td>{{ $user->name }}</td> <!-- User Name -->
                        <td>{{ $user->email }}</td> <!-- User Email -->
                        <td>{{ $orderCount }}</td> <!-- Total Orders -->
                        <td>
                            <a href="{{ route('seller.userOrders', $user->id) }}" class="btn btn-primary">
                                View Orders
                            </a>
                        </td> <!-- Link to View User's Orders -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection