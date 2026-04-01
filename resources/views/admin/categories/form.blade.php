@extends('admin.layouts.admin')

@section('title', $category ?? 'Add' . ' Category')
@section('header', isset($category) ? 'Edit Category' : 'Add Category')

@section('content')

    <div class="card admin-card mx-auto" style="max-width: 700px;">
        <div class="card-body">
            <form
                action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
                method="POST" enctype="multipart/form-data" class="admin-form">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ $category->name ?? old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Slug <span class="text-danger">*</span></label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                        value="{{ $category->slug ?? old('slug') }}" required>
                    <small class="text-muted">Unique identifier (e.g., kulfi, ice-creams)</small>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror"
                        accept="image/*">
                    @error('thumbnail')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if (!empty($category?->thumbnail))
                        <div class="mt-2">
                            <img src="{{ asset('public/' . $category->thumbnail) }}" alt="Preview" class="img-thumbnail preview-thumb">
                        </div>
                    @endif
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
