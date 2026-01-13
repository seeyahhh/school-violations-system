<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appeal;
use App\Models\Status;

class AppealController extends Controller
{
    /* Display a list of all appeals */
    public function index()
    {
        // Fetch all appeals with relationships
        $appeals = Appeal::with([
            'violationRecord.user',
            'violationRecord.violationSanction.violation',
            'violationRecord.violationSanction.sanction',
        ])
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate summary based on is_accepted column
        $summary = [
            'pending' => Appeal::whereNull('is_accepted')->count(),
            'approved' => Appeal::where('is_accepted', true)->count(),
            'rejected' => Appeal::where('is_accepted', false)->count(),
        ];

        return view('admin.appeals', compact('appeals', 'summary'));
    }

    /* Approve an appeal */
    public function approve(Appeal $appeal)
    {
        // Check if appeal is already processed
        if (! is_null($appeal->is_accepted)) {
            return redirect()->route('admin.appeals.index')
                ->with('warning', 'This appeal has already been processed.');
        }

        // Update the appeal status to approved
        $appeal->update([
            'is_accepted' => true,
        ]);

        $violationRecord = $appeal->violationRecord();

        $violationRecord->update([
            'status_id' => 3,
        ]);

        return redirect()->route('admin.appeals.index')
            ->with('success', 'Appeal has been approved successfully.');
    }

    /* Reject an appeal */
    public function reject(Appeal $appeal)
    {
        // Check if appeal is already processed
        if (! is_null($appeal->is_accepted)) {
            return redirect()->route('admin.appeals.index')
                ->with('warning', 'This appeal has already been processed.');
        }

        // Update the appeal status to rejected
        $appeal->update([
            'is_accepted' => false,
        ]);

        $violationRecord = $appeal->violationRecord();

        $violationRecord->update([
            'status_id' => 4,
        ]);

        return redirect()->route('admin.appeals.index')
            ->with('success', 'Appeal has been rejected.');
    }
}
