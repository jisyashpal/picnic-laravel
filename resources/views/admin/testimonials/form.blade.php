@extends('admin.layouts.admin')

@section('title', isset($testimonial) ? 'Edit Testimonial' : 'Add Testimonial')
@section('header', isset($testimonial) ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
<div class="card admin-card mx-auto" style="max-width: 700px;">
    <div class="card-body">
        <form action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" method="POST" class="admin-form">
            @csrf
            @if(isset($testimonial))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $testimonial->name ?? old('name') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ $testimonial->location ?? old('location') }}">
                @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Review <span class="text-danger">*</span></label>
                <textarea name="review" class="form-control @error('review') is-invalid @enderror" rows="4" required>{{ $testimonial->review ?? old('review') }}</textarea>
                @error('review')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Avatar URL</label>
                <input type="url" name="avatar" class="form-control @error('avatar') is-invalid @enderror" value="{{ $testimonial->avatar ?? old('avatar') }}">
                <small class="text-muted">Image URL for profile picture</small>
                @error('avatar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Border Color</label>
                <input type="color" name="border_color" class="form-control form-control-color @error('border_color') is-invalid @enderror" value="{{ $testimonial->border_color ?? '#ffc107' }}">
                @error('border_color')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
