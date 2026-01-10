<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Violation;
use Illuminate\Http\Request;
use App\Models\ViolationRecord;

class DashboardController extends Controller
{
    public function index()
    {
        $violations = Violation::all();

        $violationRecords = ViolationRecord
            ::with(['status', 'user', 'violationSanction.violation', 'violationSanction.sanction', 'appeal'])
            ->latest()
            ->paginate(10);

        $violationRecordCount = ViolationRecord::all()->count();

        $under_reviewCount = ViolationRecord::where('status_id', 1)->count();

        $pendingCount = ViolationRecord::where('status_id', 2)->count();

        $resolvedCount = ViolationRecord::where('status_id', 3)->count();

        $statuses = Status::all();

        // return response()->json($violationRecords);
        return view(
            'admin.dashboard',
            compact(
                'violations',
                'violationRecords',
                'violationRecordCount',
                'under_reviewCount',
                'pendingCount',
                'resolvedCount',
                'statuses'
            )
        );
    }
}
