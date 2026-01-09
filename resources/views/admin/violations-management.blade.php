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
            <x-violation-card :record="$record" />
        </div>
        @endforeach
    </div>

    <div class="mt-4 text-secondary small">
        Showing {{ count($violationRecords) }} violations
    </div>
</div>

@endsection