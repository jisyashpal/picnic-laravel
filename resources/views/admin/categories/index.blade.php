@extends('admin.layouts.admin')

@section('title', 'Admin - Categories')
@section('header', 'Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="mb-0">All Categories</h6>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">+ Add Category</a>
    </div>

    <div class="card admin-card">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-modern mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thumb</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Products</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>
                                @if ($cat->thumbnail)
                                    <img src="{{ asset('public/' . $cat->thumbnail) }}" alt="" class="img-thumbnail"
                                        style="max-height:50px;">
                                @endif
                            </td>
                            <td>{{ $cat->name }}</td>
                            <td><code>{{ $cat->slug }}</code></td>
                            <td>{{ $cat->products()->count() }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $cat) }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST"
                                    style="display: inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4" >No categories. <a
                                    href="{{ route('admin.categories.create') }} " class="btn btn-sm btn-outline-danger">Create one</a></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
