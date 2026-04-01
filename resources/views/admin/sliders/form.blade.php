@extends('admin.layouts.admin')

@section('title', isset($slider) ? 'Edit Slider' : 'Add Slider')
@section('header', isset($slider) ? 'Edit Slider' : 'Add Slider')

@section('content')
    <div class="card admin-card mx-auto" style="max-width: 700px;">
        <div class="card-body">
            <form action="{{ isset($slider) ? route('admin.sliders.update', $slider) : route('admin.sliders.store') }}"
                method="POST" enctype="multipart/form-data" class="admin-form">
                @csrf
                @if (isset($slider))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ $slider->title ?? old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"
                        value="{{ $slider->subtitle ?? old('subtitle') }}">
                    @error('subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" id="imageInput"
                        class="form-control @error('image') is-invalid @enderror" accept="image/*"
                        onchange="previewImage(event)">
                    <small class="text-muted">Upload banner image</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div id="imagePreview" class="mt-2" @if (empty($slider?->image)) style="display:none;" @endif>
                        <img id="previewImg" src="{{ asset('public/' . ($slider?->image ?? '')) }}" alt="Preview"
                            class="img-thumbnail preview-thumb">
                        <p class="small text-muted mt-1">
                            {{ !empty($slider?->image) ? 'Current: ' . basename($slider->image) : '' }}</p>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">CTA Button Text</label>
                    <input type="text" name="cta_text" class="form-control @error('cta_text') is-invalid @enderror"
                        value="{{ $slider->cta_text ?? old('cta_text') }}" placeholder="e.g., Order Now">
                    @error('cta_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">CTA Button URL</label>
                    <input type="text" name="cta_url" class="form-control @error('cta_url') is-invalid @enderror"
                        value="{{ $slider->cta_url ?? old('cta_url') }}" placeholder="e.g., /order">
                    @error('cta_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
                        value="{{ $slider->sort_order ?? old('sort_order', 0) }}">
                    <small class="text-muted">Lower number = appears first</small>
                    @error('sort_order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="active" id="active" class="form-check-input"
                        @checked($slider->active ?? true)>
                    <label class="form-check-label" for="active">Active</label>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const img = document.getElementById('previewImg');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
