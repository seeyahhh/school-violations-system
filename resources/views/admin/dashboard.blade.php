@extends('layouts.admin.app')

@section('navbar-title', 'Violation and Sanction Management')
@section('content')
<div class="container-fluid w-100">
    <div class="">Admin</div>
    <form action="{{ route('logout')}}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div>
        <div>
            Total Violations: {{ $violationRecordCount }}
        </div>
        <div>
            Pending: {{ $pendingCount }}
        </div>
        <div>
            Under Review: {{ $under_reviewCount }}
        </div>
        <div>
            Resolved: {{ $resolvedCount }}
        </div>
        <br>
        <div>
            Violation Logs:

            @foreach ($violationRecords as $violationRecord)
            <div>
                {{ $violationRecord }}
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection