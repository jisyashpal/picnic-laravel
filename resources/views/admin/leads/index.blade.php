@extends('admin.layouts.admin')

@section('title', 'Admin - Leads')
@section('header', 'All Leads')

@section('content')
    <div class="card admin-card">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Form Submissions</h6>
                <a href="{{ route('admin.leads.export') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-download me-1"></i>Export CSV
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-modern mb-0 ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Subject</th>
                            <th>Source</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leads as $lead)
                            <tr>
                                <td>{{ $lead->id }}</td>
                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->phone }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->business_type }}</td>
                                <td>{{ $lead->subject }}</td>
                                <td><span class="badge bg-secondary">{{ $lead->source }}</span></td>
                                <td><span class="badge bg-info">{{ $lead->status }}</span></td>
                                <td>{{ $lead->created_at?->format('M d, Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">No leads yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
