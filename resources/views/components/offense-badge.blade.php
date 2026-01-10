<div>
    @if($offense == 1)
    <span class="badge bg-info text-uppercase" style="font-size: 12px;">
        First Offense
    </span>
    @elseif($offense == 2)
    <span class="badge bg-warning text-dark text-uppercase" style="font-size: 12px;">
        Second Offense
    </span>
    @else
    <span class="badge bg-danger text-uppercase" style="font-size: 12px;">
        Third Offense
    </span>
    @endif
</div>