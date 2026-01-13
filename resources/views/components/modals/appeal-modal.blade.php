@props(['appeal'])

@php
    $statusText = is_null($appeal->is_accepted) ? 'PENDING' : ($appeal->is_accepted ? 'APPROVED' : 'REJECTED');
    $badgeClass = is_null($appeal->is_accepted) ? 'warning' : ($appeal->is_accepted ? 'success' : 'danger');
@endphp

<div class="modal fade" id="appealModal{{ $appeal->id }}" tabindex="-1" aria-labelledby="appealModalLabel{{ $appeal->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            {{-- Modal Header --}}
            <div class="modal-header bg-info text-white border-0">
                <h5 class="modal-title fw-bold" id="appealModalLabel{{ $appeal->id }}">
                    Appeal Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body p-4">
                <div class="row g-3">
                    {{-- Case ID & Status --}}
                    <div class="col-md-6">
                        <label class="text-muted text-uppercase small fw-semibold mb-1">Case ID</label>
                        <p class="fw-bold text-danger mb-0">{{ $appeal->violationRecord->formatCaseId() }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted text-uppercase small fw-semibold mb-1">Status</label>
                        <div>
                            <span class="badge bg-{{ $badgeClass }} px-3 py-2">{{ $statusText }}</span>
                        </div>
                    </div>

                    {{-- Student ID & Name --}}
                    <div class="col-md-6">
                        <label class="text-muted text-uppercase small fw-semibold mb-1">Student ID</label>
                        <p class="mb-0">{{ $appeal->violationRecord->user->school_id }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted text-uppercase small fw-semibold mb-1">Student Name</label>
                        <p class="mb-0">
                            {{ $appeal->violationRecord->user->first_name }} 
                            {{ $appeal->violationRecord->user->last_name }}
                        </p>
                    </div>

                    {{-- Violation Type & Date --}}
                    <div class="col-md-6">
                        <label class="text-muted text-uppercase small fw-semibold mb-1">Violation Type</label>
                        <p class="mb-0">{{ $appeal->violationRecord->violationSanction->violation->violation_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted text-uppercase small fw-semibold mb-1">Date</label>
                        <p class="mb-0">{{ $appeal->created_at->format('Y-m-d') }}</p>
                    </div>

                    {{-- Appeal Content --}}
                    <div class="col-12">
                        <label class="text-muted text-uppercase small fw-semibold mb-1">Appeal</label>
                        <p class="text-muted mb-0">{{ $appeal->appeal_content }}</p>
                    </div>

                    @if(!is_null($appeal->is_accepted))
                    {{-- Decision Date --}}
                    <div class="col-12">
                        <label class="text-muted text-uppercase small fw-semibold mb-1">Decision Date</label>
                        <p class="mb-0">{{ $appeal->updated_at->format('F d, Y h:i A') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Modal Footer --}}
            <div class="modal-footer border-0 justify-content-between p-4 pt-0">
                @if(is_null($appeal->is_accepted))
                    <form action="{{ route('admin.appeals.approve', $appeal->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-success px-4">Accept</button>
                    </form>
                    <form action="{{ route('admin.appeals.reject', $appeal->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger px-4 ">Reject</button>
                    </form>
                @endif
                <button type="button" class="btn btn-dark px-4 ms-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>