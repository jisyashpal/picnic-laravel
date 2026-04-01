@extends('admin.layouts.admin')

@section('title', isset($store) ? 'Edit Store' : 'Add Store')
@section('header', isset($store) ? 'Edit Store' : 'Add Store')

@section('content')
<div class="card admin-card mx-auto" style="max-width: 700px;">
    <div class="card-body">
        <form action="{{ isset($store) ? route('admin.stores.update', $store) : route('admin.stores.store') }}" method="POST" class="admin-form">
            @csrf
            @if(isset($store))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Store Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $store->name ?? old('name') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $store->city ?? old('city') }}">
                @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="2">{{ $store->address ?? old('address') }}</textarea>
                @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $store->phone ?? old('phone') }}">
                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Latitude</label>
                    <input type="number" name="latitude" step="0.0000001" class="form-control @error('latitude') is-invalid @enderror" value="{{ $store->latitude ?? old('latitude') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Longitude</label>
                    <input type="number" name="longitude" step="0.0000001" class="form-control @error('longitude') is-invalid @enderror" value="{{ $store->longitude ?? old('longitude') }}">
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.stores.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
