@extends('layouts.app')

@section('content')
<!-- Welcome Section -->
<div class="text-center py-4" style="margin: 0; background: linear-gradient(to right, rgb(9, 82, 183), #4c00b0, #00c2ff); color: white; border-radius: 50px; width: 95%; max-width: 1400px; margin: 10px auto; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
    <h1 class="fw-bold mb-1" style="font-size: 2rem;">Welcome to Laravel</h1>
    <p class="small mb-0" style="font-size: 1rem;">Living the Future, Powered by Tech</p>
</div>

<div class="container my-4 px-4">
    <h2 class="text-center mb-4 fw-bold">Our Products</h2>

    <!-- Product Grid -->
    <div class="row justify-content-center mx-3">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- Product Image -->
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top" 
                             alt="{{ $product->name }}" 
                             style="height: 250px; object-fit: contain;">
                    @else
                        <img src="{{ asset('images/no-image-available.png') }}" 
                             class="card-img-top" 
                             alt="No Image" 
                             style="height: 250px; object-fit: contain;">
                    @endif

                    <!-- Product Details -->
                    <div class="card-body text-center" style="min-height: 150px;">
                        <!-- Product Name -->
                        <h5 class="card-title mb-1">{{ \Illuminate\Support\Str::limit($product->name, 30) }}</h5>

                        <!-- Product Price -->
                        <p class="card-text mb-1 text-black fw-bold">${{ number_format($product->price, 2) }}</p>

                        <!-- View Button -->
                        <a href="{{ route('products.show', $product) }}" 
                           class="btn mt-2 py-2" 
                           style="background-color: rgb(42, 87, 212); color: white; font-weight: bold; width: 94%;">
                            <i class="fa fa-eye"></i> View
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No Products Available</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
