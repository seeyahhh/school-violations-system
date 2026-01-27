<div class="d-flex justify-content-center gap-2 align-items-center">
    @if($appeal->is_accepted === true)
    <span class="badge text-uppercase bg-success rounded-pill px-3 py-1 small">
        Accepted
    </span>
    @elseif($appeal?->is_accepted === false)
    <span class="badge text-uppercase bg-danger rounded-pill px-3 py-1 small">
        Rejected
    </span>
    @else
    <span class="badge text-uppercase bg-warning rounded-pill px-3 py-1 small">
        PENDING
    </span>
    @endif
</div>