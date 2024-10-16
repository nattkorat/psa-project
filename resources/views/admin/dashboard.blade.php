@extends('layouts.admin')

@section('content')
<h1 class="text-primary">Dashboard</h1>
<hr>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-primary text-center">Users</h5>
        <hr>
            Admin: {{$users['admins']}}
            Sellers: {{ $users['sellers'] }}
            Users: {{ $users['users'] }}
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center text-primary">Product:</h5>
        <hr>
        Total Products: {{  $total_product }}
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center text-primary">Seller Request:</h5>
        <hr>
          <span class="text-danger">
            Pendding Request: {{ $sell_reqeust }}
          </span>
      </div>
    </div>
  </div>
</div>

<div class="mt-5">
  <h2 class="text-primary">List of Products</h2>
  <hr>
  @if(count($product) > 0)
    <table class="table table-striped">
        <thead>
            <th> </th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
        </thead>
        <tbody>
            @foreach($product as $product)
            <tr>
                        <td>
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100px;">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <!-- <td>
                            <a href="{{ route('product.details', $product->id) }}" class="btn btn-info">
                                Details</a>
                        </td> -->
                    </tr>
            @endforeach
        </tbody>
    </table>
  @else
  <br>
  <p class="text-danger">No  Product Yet!</p>
  @endif
</div>


@endsection