@extends('layouts.seller')

@section('content')
<div class="container">
    <h1 class="text-primary">Orders for {{ $orders->first()->user->name }}</h2>
    <hr>

    @if($orders->isEmpty())
        <p>No orders found for this user.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date Ordered</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td> <!-- Order ID -->
                        <td>{{ $order->product->name }}</td> <!-- Product Name -->
                        <td>{{ $order->amount }}</td> <!-- Amount Ordered -->
                        <td>{{ ucfirst($order->status) }}</td> <!-- Status -->
                        <td>{{ $order->created_at->format('d-m-Y') }}</td> <!-- Order Date -->
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary">Confirm Order</button>
    @endif
</div>
@endsection
