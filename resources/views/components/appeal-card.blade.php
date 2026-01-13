@props(['appeal'])

@php
    $statusText = is_null($appeal->is_accepted) ? 'PENDING' : ($appeal->is_accepted ? 'APPROVED' : 'REJECTED');
    $badgeClass = is_null($appeal->is_accepted) ? 'warning' : ($appeal->is_accepted ? 'success' : 'danger');
@endphp

<div class="col-lg-3 col-md-4 col-sm-6 col-12">
    <div class="card shadow-sm h-100">
        <div class="card-body d-flex flex-column position-relative">
            {{-- Status Badge in Top Right --}}
            <div class="position-absolute top-0 end-0 m-2">
                <span class="badge bg-{{ $badgeClass }} rounded-pill px-3 py-1 small">
                    {{ $statusText }}
                </span>
            </div>

            {{-- Case ID --}}
            <h5 class="fw-bold text-danger mb-2">
                {{ $appeal->violationRecord->formatCaseId() }}
            </h5>

            {{-- Student Name --}}
            <h6 class="mb-1">
                {{ $appeal->violationRecord->user->first_name }} 
                {{ $appeal->violationRecord->user->last_name }}
            </h6>

            {{-- Student ID --}}
            <p class="text-muted small mb-2">
                {{ $appeal->violationRecord->user->school_id }}
            </p>

            {{-- Violation Name --}}
            <p class="fw-semibold mb-2">
                {{ $appeal->violationRecord->violationSanction->violation->violation_name }}
            </p>

            {{-- Date --}}
            <p class="text-muted small mb-3">
                {{ $appeal->created_at->format('Y-m-d') }}
            </p>

            {{-- Appeal Section --}}
            <div class="mb-3 grow">
                <p class="fw-semibold mb-1 small">Appeal</p>
                <p class="text-muted small" style="font-size: 0.85rem;">
                    {{ Str::limit($appeal->appeal_content, 100) }}
                </p>
            </div>

            {{-- View Button --}}
            <div class="mt-auto">
                <button class="btn btn-outline-danger w-100 "
                    data-bs-toggle="modal"
                    data-bs-target="#appealModal{{ $appeal->id }}">
                    View
                </button>
            </div>
        </div>
    </div>
</div>