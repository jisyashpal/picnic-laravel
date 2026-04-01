@extends('admin.layouts.admin')

@section('title', 'Admin - Sliders')
@section('header', 'Sliders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="mb-0">All Sliders</h6>
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-sm btn-primary">+ Add Slider</a>
</div>

<div class="card admin-card">
    <div class="table-responsive">
        <table class="table table-sm table-striped table-modern mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>CTA</th>
                    <th>Order</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($sliders as $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>
                        @if($slider->image)
                            <img src="{{ asset('public/' . $slider->image) }}" alt="" class="img-thumbnail" style="max-height:60px;">
                        @endif
                    </td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ Str::limit($slider->subtitle, 30) }}</td>
                    <td>{{ $slider->cta_text }}</td>
                    <td>{{ $slider->sort_order }}</td>
                    <td><span class="badge {{ $slider->active ? 'bg-success' : 'bg-secondary' }}">{{ $slider->active ? 'Yes' : 'No' }}</span></td>
                    <td>
                        <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center text-muted py-4">No sliders. <a href="{{ route('admin.sliders.create') }}" class="btn btn-sm btn-outline-danger">Create one</a></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($sliders->hasPages())
    <div class="mt-3">{{ $sliders->links() }}</div>
@endif
@endsection
