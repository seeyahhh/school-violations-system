<div>
    @if($offense == 1)
    <span class="badge text-uppercase" style="font-size: 12px; background-color: #c4b451; color: #fdf6c7;">
        First Offense
    </span>
    @elseif($offense == 2)
    <span class="badge text-uppercase" style="font-size: 12px; background-color: #d68630; color: #ffe4c8;">
        Second Offense
    </span>
    @else
    <span class="badge text-uppercase" style="font-size: 12px; background-color: #b24949; color: #ffcdcd;">
        Third Offense
    </span>
    @endif
</div>