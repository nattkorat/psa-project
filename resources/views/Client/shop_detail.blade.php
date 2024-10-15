@extends('layouts.app')
@section('content')
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="border rounded image-container">
                            <a href="#">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="fw-bold mb-3">{{$product->name}}</h4>
                        <h5 class="fw-bold mb-3">{{$product->price}} $</h5>

                        <p class="mb-4">{{$product->description}}</p>
                        
                        <div class="input-group quantity mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-minus rounded-circle bg-light border" id="decrease-btn">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" id="quantity" class="form-control form-control-sm text-center border-0" value="1" readonly>
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-plus rounded-circle bg-light border" id="increase-btn">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<script>
    // Get references to the buttons and input field
    const quantityInput = document.getElementById('quantity');
    const increaseBtn = document.getElementById('increase-btn');
    const decreaseBtn = document.getElementById('decrease-btn');

    // Increase quantity on plus button click
    increaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value); // Get current value
        quantityInput.value = currentValue + 1; // Increase by 1
    });

    // Decrease quantity on minus button click, ensuring it doesn't go below 1
    decreaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value); // Get current value
        if (currentValue > 1) { // Ensure value doesn't go below 1
            quantityInput.value = currentValue - 1; // Decrease by 1
        }
    });
</script>

@endsection
