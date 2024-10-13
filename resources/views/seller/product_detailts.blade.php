@extends('layouts.seller')

@section('content')
@if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1050;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif
<h1 class="text-primary">Product Details</h1>
<hr>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
              <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid mb-2">
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="productName" value="{{ $product->name }}" readonly>
            </div>
            <div class="mb-3">
              <label for="productDescription" class="form-label">Description</label>
              <textarea class="form-control" id="productDescription" rows="3" readonly>{{ $product->description }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3">
            <label for="productPrice" class="form-label">Price ($)</label>
            <input type="text" class="form-control" id="productPrice" value="{{ $product->price }}" readonly>
        </div>
    </div>
    <div class="row">
        <!-- Button to trigger modal -->
        <div class="col-1">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
        </div>
        <div class="col-2">
            <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Product</button>
            </form>
        </div>
    </div>

</div>

</div>

<!-- Modal for updating product -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('seller.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="mb-3">
                        <label for="modalProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="modalProductName" name="name" value="{{ $product->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="modalProductDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="modalProductDescription" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="modalProductPrice" class="form-label">Price ($)</label>
                        <input type="text" class="form-control" id="modalProductPrice" name="price" value="{{ $product->price }}">
                    </div>

                    <div class="mb-3">
                        <label for="modalProductImage" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="modalProductImage" name="image">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
