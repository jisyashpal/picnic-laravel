@extends('admin.layouts.admin')

@section('title', isset($video) ? 'Edit Video' : 'Add Video')
@section('header', isset($video) ? 'Edit Video' : 'Add Video')

@section('content')
<div class="card admin-card mx-auto" style="max-width: 700px;">
    <div class="card-body">
        <form action="{{ isset($video) ? route('admin.videos.update', $video) : route('admin.videos.store') }}" method="POST" class="admin-form">
            @csrf
            @if(isset($video))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">YouTube URL <span class="text-danger">*</span></label>
                <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ $video->url ?? old('url') }}" placeholder="https://youtu.be/VIDEO_ID or https://youtube.com/shorts/VIDEO_ID or https://www.youtube.com/watch?v=VIDEO_ID" required>
                <small class="text-muted">Paste the full YouTube share link, Shorts URL, or regular video URL</small>
                @error('url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ $video->type ?? 'youtube' }}" placeholder="youtube">
                @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
