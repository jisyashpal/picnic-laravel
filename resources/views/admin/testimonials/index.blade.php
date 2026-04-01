@extends('admin.layouts.admin')

@section('title', 'Admin - Testimonials')
@section('header', 'Testimonials')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="mb-0">All Testimonials</h6>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-sm btn-primary">+ Add Testimonial</a>
</div>

<div class="card admin-card">
    <div class="table-responsive">
        <table class="table table-sm table-striped table-modern mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Review</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($testimonials as $test)
                <tr>
                    <td>{{ $test->id }}</td>
                    <td>{{ $test->name }}</td>
                    <td>{{ $test->location }}</td>
                    <td>{{ Str::limit($test->review, 50) }}</td>
                    <td>
                        <a href="{{ route('admin.testimonials.edit', $test) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.testimonials.destroy', $test) }}" method="POST" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted py-4">No testimonials. <a href="{{ route('admin.testimonials.create') }}" class="btn btn-sm btn-outline-danger">Create one</a></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($testimonials->hasPages())
    <div class="mt-3">{{ $testimonials->links() }}</div>
@endif
@endsection
