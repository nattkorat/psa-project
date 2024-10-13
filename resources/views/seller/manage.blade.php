@extends('layouts.seller')

@section('content')
<h1 class="text-primary">Product Management</h1>
<hr>

@if(count($products))
        <table class="table table-striped">
            <thead>
                <th>Product Profile</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100px;">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('product.details', $product->id) }}" class="btn btn-info">
                                Details</a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                <a href="{{ route('seller.add_product') }} " class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg> Add new product
                </a>
                </tr>
            </tbody>

    @else
    <h3 class="text-danger text-center">No Product yet!</h3>
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('seller.add_product') }} " class="btn btn-primary">Create a product</a>
        </div>
    @endif

@endsection