@extends('admin.layouts.admin')

@section('title', 'Admin - Stores')
@section('header', 'Stores')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="mb-0">All Stores</h6>
    <a href="{{ route('admin.stores.create') }}" class="btn btn-sm btn-primary">+ Add Store</a>
</div>

<div class="card admin-card">
    <div class="table-responsive">
        <table class="table table-sm table-striped table-modern mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($stores as $store)
                <tr>
                    <td>{{ $store->id }}</td>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->city }}</td>
                    <td>{{ $store->phone }}</td>
                    <td>
                        <a href="{{ route('admin.stores.edit', $store) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.stores.destroy', $store) }}" method="POST" style="display: inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted py-4">No stores. <a href="{{ route('admin.stores.create') }}" class="btn btn-sm btn-outline-danger">Create one</a></td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($stores->hasPages())
    <div class="mt-3">{{ $stores->links() }}</div>
@endif
@endsection
