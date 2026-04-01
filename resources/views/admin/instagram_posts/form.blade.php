@extends('admin.layouts.admin')

@section('title', isset($instagramPost) ? 'Edit Instagram Post' : 'Add Instagram Post')
@section('header', isset($instagramPost) ? 'Edit Instagram Post' : 'Add Instagram Post')

@section('content')
    <div class="card admin-card mx-auto" style="max-width: 700px;">
        <div class="card-body">
            <form action="{{ isset($instagramPost) ? route('admin.instagram-posts.update', $instagramPost) : route('admin.instagram-posts.store') }}"
                method="POST" enctype="multipart/form-data" class="admin-form">
                @csrf
                @if (isset($instagramPost))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Image <span class="text-danger">*</span></label>
                    <input type="file" name="image" id="imageInput"
                        class="form-control @error('image') is-invalid @enderror" accept="image/*"
                        onchange="previewImage(event)" @if(!isset($instagramPost)) required @endif>
                    <small class="text-muted">Upload instagram post image</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div id="imagePreview" class="mt-2" @if (empty($instagramPost?->image)) style="display:none;" @endif>
                         <img id="previewImg" src="{{ asset('public/'. ($instagramPost?->image ?? '#')) }}" alt="Preview"
                            class="img-thumbnail preview-thumb">
                        <p class="small text-muted mt-1">
                            {{ !empty($instagramPost?->image) ? 'Current: ' . basename($instagramPost->image) : '' }}</p>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Instagram Post URL</label>
                    <input type="url" name="post_url" class="form-control @error('post_url') is-invalid @enderror"
                        value="{{ $instagramPost->post_url ?? old('post_url') }}" placeholder="https://www.instagram.com/p/...">
                    <small class="text-muted">Optional: Link to the actual Instagram post</small>
                    @error('post_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Embed HTML</label>
                    <textarea name="embed_html" rows="4" class="form-control @error('embed_html') is-invalid @enderror"
                        placeholder="Optional: Instagram embed code">{{ $instagramPost->embed_html ?? old('embed_html') }}</textarea>
                    <small class="text-muted">Optional: Instagram embed HTML code</small>
                    @error('embed_html')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.instagram-posts.index') }}" class="btn btn-secondary">Cancel</a>
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
