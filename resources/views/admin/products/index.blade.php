@extends('admin.layouts.admin')

@section('title', 'Admin - Products')
@section('header', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="mb-0">All Products</h6>
    <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">+ Add Product</a>
</div>

<div class="card admin-card">
    <div class="table-responsive">
        <table class="table table-sm table-striped table-modern mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('public/' . $product->image) }}" alt="" class="img-thumbnail" style="max-height:60px;">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category?->name }}</td>
                    <td>{{ $product->price ? '₹' . number_format($product->price, 2) : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure !! Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted py-4">No products. <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-outline-danger">Create one</a></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($products->hasPages())
    <div class="mt-3">{{ $products->links() }}</div>
@endif
@endsection
