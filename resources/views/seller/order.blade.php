@extends('layouts.seller')

@section('content')
    <h1 class="text-primary">Order List</h1>
    <hr>
    @if(count($orders) <= 0)
        <h3 class="text-danger text-center">No Product yet!</h3>
    @else
        <table class="table table-striped">
            <thead>
                <th>Product Profile</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100px;">
                        </td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{ route('order.details', $order->user_id) }}" class="btn btn-info">
                                Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    @endif

@endsection