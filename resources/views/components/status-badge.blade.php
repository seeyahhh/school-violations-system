<div>
    @if($status == 'In progress')
    <span class="badge text-uppercase" style="font-size: 12px; background-color: #904db5; color: #edd3fb;">
        In Progress
    </span>
    @elseif($status == 'Under review')
    <span class="badge text-uppercase" style="font-size: 12px; background-color: #4998a4; color: #9bf2ff;">
        Under Review
    </span>
    @elseif($status == 'Dismissed')
    <span class="badge text-uppercase" style="font-size: 12px; background-color: #8b8b8b; color: #e7e7e7;">
        Dismissed
    </span>
    @else
    <span class="badge text-uppercase" style="font-size: 12px; background-color: #578b58; color: #aaefac;">
        Resolved
    </span>
    @endif
</div>