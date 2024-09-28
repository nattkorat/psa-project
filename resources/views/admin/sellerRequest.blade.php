@extends('layouts.admin')

@section('content')
    @if (session('accept'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1050;">
            {{ session('accept') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('reject'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1050;">
            {{ session('reject') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(count($sellerRequests))
        <h1 class="text-primary">Seller Request List</h1>
        <hr>
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Store Name</th>
                <th>Request Date</th>
            </thead>
            <tbody>
                @foreach($sellerRequests as $sellerRequest)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sellerRequest->name }}</td>
                        <td>{{ $sellerRequest->store }}</td>
                        <td>{{ $sellerRequest->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('admin.seller.request.accept', $sellerRequest->id ) }}" class="btn btn-primary">
                                Accept</a>
                            <a href="{{ route('admin.seller.request.reject', $sellerRequest->id) }}" class="btn btn-danger">
                                Reject</a>
                            <a href="{{ route('admin.seller.request.details', $sellerRequest->id) }}" class="btn btn-info">
                                Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

    @else
        <h1 class="text-danger">No Selling Request</h1>

    @endif
@endsection