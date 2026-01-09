<div class="card border-0 h-100" style="box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 8px;">
    <div class="card-body p-3">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <span class="fw-bold" style="color: #800000;">
                V-2026-{{ str_pad($record->id, 3, '0', STR_PAD_LEFT) }}
            </span>
            <x-status-badge :status="$record->status->status_name" />
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

        <button class="btn w-100 btn-sm fw-bold" style="border: 1px solid #800000; color: #800000; padding: 8px;">
            <i class="bi bi-eye me-1"></i> View Details
        </button>
    </div>
</div>