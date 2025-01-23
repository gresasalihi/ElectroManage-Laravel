@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4 fw-bold">Edit Product</h2>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Product Name</strong></label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Enter product name" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Description</strong></label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Enter product description">{{ $product->description }}</textarea>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label"><strong>Price</strong></label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" placeholder="Enter product price" required>
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label"><strong>Product Image</strong></label>
                    <input type="file" name="image" class="form-control">
                    @if ($product->image)
                        <div class="mt-2">
                            <p>Current Image:</p>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    @endif
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-pen"></i> <strong>Update Product</strong>
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> <strong>Back to List</strong>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
