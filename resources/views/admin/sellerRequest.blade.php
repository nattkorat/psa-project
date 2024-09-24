@extends('layouts.admin')

@section('content')
    @if(count($sellerRequests))
        <h1 class="text-primary">Seller Request List</h1>
        <hr>
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Store Name</th>
                <th>Address</th>
                <th>Request Date</th>
            </thead>
            <tbody>
                @foreach($sellerRequests as $sellerRequest)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sellerRequest->name }}</td>
                        <td>{{ $sellerRequest->email }}</td>
                        <td>{{ $sellerRequest->store }}</td>
                        <td>{{ $sellerRequest->address }}</td>
                        <td>{{ $sellerRequest->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('admin.seller.request.accept', ['id' => $sellerRequest->id]) }}" class="btn btn-primary">
                                Accept</a>
                            <a href="{{ route('admin.seller.request.reject', ['id' => $sellerRequest->id]) }}" class="btn btn-danger">
                                Reject</a>
                            <a href="{{ route('admin.seller.request.details', ['id' => $sellerRequest->id]) }}" class="btn btn-info">
                                Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

    @else
        <h1 class="text-dange">No Selling Request</h1>

    @endif
@endsection