@extends('admin.layouts.admin')

@section('title', isset($product) ? 'Edit Product' : 'Add Product')
@section('header', isset($product) ? 'Edit Product' : 'Add Product')

@section('content')
<div class="card admin-card mx-auto" style="max-width: 700px;">
    <div class="card-body">
        <form action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name ?? old('name') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Category <span class="text-danger">*</span></label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(($product->category_id ?? null) == $cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" step="0.01" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price ?? old('price') }}">
                @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                @if(!empty($product?->image))
                    <div class="mt-2">
                        <img src="{{ asset('public/' . $product->image) }}" alt="Preview" class="img-thumbnail preview-thumb">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ $product->description ?? old('description') }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
