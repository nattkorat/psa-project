@extends('layouts.seller')

@section('content')
<h1 class="text-primary">Dashboard</h1>
<hr>

<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center text-primary">Product:</h5>
        <hr>
        Total Products: {{ $total }}
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center text-primary">Order Request:</h5>
        <hr>
          <span class="text-danger">
            Pendding Request: 
          </span>
      </div>
    </div>
  </div>
</div>

<div class="mt-5">
  <h2 class="text-primary">List of Products</h2>
  <hr>
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
              </tr>
          @endforeach
      </tbody>
  </table>
</div>


@endsection