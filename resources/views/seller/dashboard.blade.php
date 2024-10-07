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
        Total Products:
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

<div class="mt-5">
  <h2 class="text-primary">List of Products</h2>
  <hr>
  
</div>


@endsection