@extends('layouts.student.app')

@section('navbar-title', 'Student Dashboard')

@section('content')

<div class="container-fluid px-3 px-lg-4 pb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0 fs-3 fs-md-2">Hello, {{ $user->first_name }}! 👋</h2>
    </div>

    <div class="row g-4">

        @include('student.partials.student-info')

        <div class="col-12 col-lg-8 col-xl-9">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header border-0 text-white fw-bold py-3 bg-primary">
                    Violation History
                </div>

                <div class="card-body p-0">
                    <div class="p-3 border-bottom bg-light">
                        <div
                            class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-2">
                            <div class="d-flex align-items-center text-muted mb-2 mb-sm-0">
                                <i class="bi bi-funnel-fill me-2"></i>
                                <span class="small me-2">Filter by:</span>
                                <form action="{{ route('student.dashboard.index') }}" method="get"
                                    class="d-inline-block">
                                    <select class="form-select form-select-sm border-secondary-subtle rounded-3"
                                        style="font-size: 0.85rem; color: #4b5563; min-width: 120px;" name="status"
                                        onchange="this.form.submit()">
                                        <option value="all">All status</option>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ request('status')==$status->id ?
                                            'selected' : '' }}>
                                            {{ $status->status_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="mx-3 mt-3">
                        <div class="alert alert-warning d-flex align-items-start p-2" role="alert">
                            <i class="bi bi-info-circle-fill me-2 mt-1"></i>
                            <div>
                                <span class="small fw-bold">Note:</span>
                                <span class="small">
                                    Appeals can no longer be available 3 days after a report is created.
                                </span>
                            </div>
                        </div>

                        @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show p-2 my-2 small" role="alert">
                            {{ $error }}
                            <button type="button" class="btn-close small" data-bs-dismiss="alert"></button>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="min-width: 800px;">
                            <thead class="table-light">
                                <tr style="font-size: 13px;">
                                    <th class="ps-4 py-3 text-muted text-nowrap text-center">CASE ID</th>
                                    <th class="py-3 text-muted text-nowrap">VIOLATION TYPE</th>
                                    <th class="py-3 text-muted text-nowrap">DATE</th>
                                    <th class="py-3 text-muted text-nowrap">RECORD</th>
                                    <th class="py-3 text-muted text-nowrap">STATUS</th>
                                    <th class="py-3 text-muted text-nowrap">SANCTION</th>
                                    <th class="text-center py-3 text-muted text-nowrap">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($violationRecords as $record)
                                <tr role="button"
                                    onclick="window.location='{{ route('student.violation.show', $record) }}'">
                                    <td class="ps-4 text-danger text-center fw-bold small text-nowrap">
                                        {{ $record->formatCaseId() }}
                                    </td>

                                    <td class="small text-wrap ">
                                        {{ $record->violationSanction->violation->violation_name }}
                                    </td>

                                    <td class="small text-muted text-nowrap">
                                        {{ \Carbon\Carbon::parse($record->created_at)->format('Y-m-d') }}
                                    </td>

                                    <td class="small">
                                        <x-offense-badge :offense="$record->violationSanction->no_of_offense" />
                                    </td>

                                    <td>
                                        <x-status-badge :status="$record->status->status_name" />
                                    </td>

                                    <td class="small text-wrap" style="max-width: 200px;">
                                        {{ $record->violationSanction->sanction->sanction_name }}
                                    </td>

                                    <td class="text-center text-nowrap">
                                        @if ($record->canBeAppealed())
                                        <button class="btn btn-sm btn-danger px-3 rounded-2 fw-bold"
                                            style="font-size: 11px;" data-bs-toggle="modal"
                                            data-bs-target="#appealModal-{{ $record->id }}" onclick="event.stopPropagation();">
                                            APPEAL
                                        </button>
                                        @endif

                                        @if($record->appeal !== null)
                                        <x-appeal-status-badge :record=" $record" />
                                        @endif
                                    </td>
                                </tr>
                                <x-modals.request-appeal :violation="$record" :id="'appealModal-'.$record->id" />
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">No records found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white border-0 py-3">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-auto mb-2 mb-sm-0 text-center text-sm-start">
                            <small class="text-muted">
                                Showing {{ $violationRecords->count() }} of {{ $violationCount }} violations
                            </small>
                        </div>
                        <div class="col-12 col-sm-auto ms-auto d-flex justify-content-center justify-content-sm-end">
                            {{ $violationRecords->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Action Toast --}}
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="actionToast" class="toast autohide" role="alert" aria-live="assertive" aria-atomic="true"
        data-response="{{ session('response') }}">
        <div class="toast-header text-bg-success">
            <strong class="me-auto">System Message</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ session('response') }}
        </div>
    </div>
</div>

@endsection