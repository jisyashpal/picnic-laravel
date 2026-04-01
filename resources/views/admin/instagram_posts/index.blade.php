@extends('admin.layouts.admin')

@section('title', 'Admin - Instagram Posts')
@section('header', 'Instagram Posts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="mb-0">All Instagram Posts</h6>
    <a href="{{ route('admin.instagram-posts.create') }}" class="btn btn-sm btn-primary">+ Add Instagram Post</a>
</div>

<div class="card admin-card">
    <div class="table-responsive">
        <table class="table table-sm table-striped table-modern mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Post URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($instagramPosts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>
                        @if($post->image)
                            <img src="{{ asset('public/'.$post->image) }}" alt="" class="img-thumbnail" style="max-height:60px;">
                        @endif
                    </td>
                    <td>
                        @if($post->post_url)
                            <a href="{{ $post->post_url }}" target="_blank">{{ Str::limit($post->post_url, 50) }}</a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.instagram-posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.instagram-posts.destroy', $post) }}" method="POST" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted py-4">No instagram posts. <a href="{{ route('admin.instagram-posts.create') }}" class="btn btn-sm btn-outline-danger">Create one</a></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($instagramPosts->hasPages())
    <div class="mt-3">{{ $instagramPosts->links() }}</div>
@endif
@endsection
