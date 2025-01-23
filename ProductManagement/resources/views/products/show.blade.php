@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4 fw-bold">Product Details</h2>
    <div class="card shadow-lg">
        <div class="card-body">
            <!-- Product Name -->
            <h3 class="card-title fw-bold" style="color:rgb(26, 76, 211);">{{ $product->name }}</h3>
            <hr>

            <!-- Product Image -->
            @if ($product->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="img-fluid rounded border" 
                         style="max-width: 300px;">
                </div>
            @else
                <p class="text-muted"><em>No image available for this product.</em></p>
            @endif


            <!-- Product Description -->
            <p class="card-text">
                <strong>Description:</strong> 
                {{ $product->description ?? 'No description provided.' }}
            </p>

            <!-- Product Price -->
            <p class="card-text">
                <strong>Price:</strong> ${{ number_format($product->price, 2) }}
            </p>

            <!-- Created At -->
            <p class="card-text">
                <strong>Created At:</strong> 
                {{ $product->created_at ? $product->created_at->format('Y-m-d H:i:s') : 'N/A' }}
            </p>

            <!-- Back to Previous Page Button -->
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
                <i class="fa fa-arrow-left"></i> <strong>Back</strong>
            </a>
        </div>
    </div>
</div>
@endsection
