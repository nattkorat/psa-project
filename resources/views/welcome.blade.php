@extends('layouts.app')
@php
    use Illuminate\Support\Str;
@endphp
<style>
    .featurs-item {
        transition: transform 0.3s; /* Smooth hover effect */
    }

    .featurs-item:hover {
        transform: scale(1.05); /* Slightly increase size on hover */
    }

    .featurs-icon {
        margin-bottom: 30px; /* Space below the icon */
        padding: 20px; /* Add some padding to the icon */
        border-radius: 50%; /* Ensure the icon is circular */
        color: white; /* Ensure text color is white */
    }

    .featurs-icon.free-shipping {
        background-color: #28a745; /* Green for Free Shipping */
    }

    .featurs-icon.security-payment {
        background-color: #007bff; /* Blue for Security Payment */
    }

    .featurs-icon.return {
        background-color: #ffc107; /* Yellow for 30 Day Return */
    }

    .featurs-icon.support {
        background-color: #dc3545; /* Red for 24/7 Support */
    }

    .featurs-content h5 {
        color: #333; /* Darker text color for headings */
    }

    .featurs-content p {
        color: #666; /* Grey text for paragraphs */
    }
</style>
@section('content')
    <!-- Hero Start -->
    <div class="container-fluid py-3 mb-4 hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-secondary">Psa Digital</h4>
                    <h1 class="mb-5 display-3 text-primary">Everything You Need, All in One Place</h1>

                </div>
                <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @foreach ($products as $product)
                                <div class="carousel-item rounded {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                        class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">{{ $product->name }}</a>
                                </div>
                            @endforeach

                            {{-- <div class="carousel-item rounded">
                            <img src="img/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                        </div> --}}
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!-- Featurs Section Start -->
    <div class="container-fluid featurs py-3">
        <div class="container py-4">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon free-shipping btn-square rounded-circle mb-5 mx-auto">
                            <i class="fas fa-car-side fa-3x"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Free Shipping</h5>
                            <p class="mb-0">Free on order over $300</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon security-payment btn-square rounded-circle mb-5 mx-auto">
                            <i class="fas fa-user-shield fa-3x"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>Security Payment</h5>
                            <p class="mb-0">100% security payment</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon return btn-square rounded-circle mb-5 mx-auto">
                            <i class="fas fa-exchange-alt fa-3x"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>30 Day Return</h5>
                            <p class="mb-0">30 day money guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="featurs-item text-center rounded bg-light p-4">
                        <div class="featurs-icon support btn-square rounded-circle mb-5 mx-auto">
                            <i class="fa fa-phone-alt fa-3x"></i>
                        </div>
                        <div class="featurs-content text-center">
                            <h5>24/7 Support</h5>
                            <p class="mb-0">Support every time fast</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs Section End -->
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-4">
        <div class="container py-4">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Our Products</h1>
                    </div>

                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @foreach ($products as $product)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img" style="height: 250px; overflow: hidden;">
                                                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="">
                                                </div>
                                            
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $product->name }}</h4>
                                                    <p>{{ Str::limit($product->description, 30) }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">${{ $product->price }}</p>
                                                        <a href="{{ route('shop_detail', $product->id)}}" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                            <i class=" me-2 text-primary"></i> More Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection
