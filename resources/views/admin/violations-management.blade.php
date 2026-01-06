@extends('layouts.admin.app')

@section('navbar-title', 'View and manage all violation record')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex flex-wrap justify-content-between mb-3 gap-2">
        <div class="d-flex gap-2" style="flex: 1; max-width: 600px;">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control border-start-0 ps-0"
                    placeholder="Search by student name, ID, or case ID...">
            </div>
            <select class="form-select" style="max-width: 150px;">
                <option selected>All status</option>
                <option value="1">Pending</option>
                <option value="2">Under Review</option>
                <option value="3">Resolved</option>
            </select>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary d-flex align-items-center gap-2"
                style="color: #800000; border-color: #800000;">
                <i class="bi bi-download"></i> Export CSV
            </button>
        </div>
    </div>

    <div class="row g-3">
        @foreach ($violationRecords as $record)
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 h-100" style="box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 8px;">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="fw-bold" style="color: #800000;">
                            V-2026-{{ str_pad($record->id, 3, '0', STR_PAD_LEFT) }}
                        </span>

                        @if($record->status_id == 1)
                        <span class="badge bg-warning text-dark rounded-1"
                            style="font-size: 11px; padding: 6px 10px;">PENDING</span>
                        @elseif($record->status_id == 2)
                        <span class="badge bg-info text-white rounded-1"
                            style="font-size: 11px; padding: 6px 10px;">UNDER REVIEW</span>
                        @elseif($record->status_id == 3)
                        <span class="badge bg-success text-white rounded-1"
                            style="font-size: 11px; padding: 6px 10px;">RESOLVED</span>
                        @else
                        <span class="badge bg-secondary text-white rounded-1"
                            style="font-size: 11px; padding: 6px 10px;">UNKNOWN</span>
                        @endif
                    </div>

                    <h6 class="fw-bold mb-1">User ID: {{ $record->user_id }}</h6>
                    <p class="text-muted small mb-3">
                        Student No: 202X-{{ $record->user_id }}XXXX-MN-0
                    </p>

                    <div class="mb-3">
                        <span class="d-block fw-bold" style="font-size: 14px;">
                            Violation Code: {{ $record->vio_sanct_id }}
                        </span>
                        <small class="text-muted" style="font-size: 12px;">
                            {{ \Carbon\Carbon::parse($record->created_at)->format('Y-m-d') }}
                        </small>
                    </div>

                    <button class="btn w-100 btn-sm fw-bold"
                        style="border: 1px solid #800000; color: #800000; padding: 8px;">
                        <i class="bi bi-eye me-1"></i> View Details
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4 text-secondary small">
        Showing {{ count($violationRecords) }} violations
    </div>
</div>

@endsection