@extends('layouts.app')

@section('content')
<div class="container my-4" style="padding-left: 6rem; padding-right: 6rem;">
    <h2 class="text-center mb-4 fw-bold">
        {{ $isAdmin ? 'Admin Dashboard - Product Management with Laravel CRUD' : 'Dashboard - Product List' }}
    </h2>

    <!-- Show Add Product Button only for Admin -->
    @if ($isAdmin)
        <div class="d-flex justify-content-start mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> <strong>Add Product</strong>
            </a>
        </div>
    @endif

    <!-- Product Table -->
    <table class="table table-striped table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Product</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $index => $product)
                <tr>
                    <!-- Dynamic SN across pages -->
                    <td>{{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}</td>

                    <!-- Truncate Product Name if too long -->
                    <td>{{ \Illuminate\Support\Str::limit($product->name, 25, '...') }}</td>

                    <!-- Product Image -->
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                                class="img-thumbnail d-block mx-auto" style="width: 120px; height: 120px; object-fit: cover;">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>

                    <!-- Product Price -->
                    <td><strong>${{ number_format($product->price, 2) }}</strong></td>

                    <!-- Action Buttons -->
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm" title="View">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if ($isAdmin)
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fa fa-pen"></i>
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <!-- Empty State -->
                <tr>
                    <td colspan="5" class="text-center">No Products Available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
