<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AppealDeniedMail;
use App\Models\Appeal;
use App\Models\Status;
use Illuminate\Support\Facades\Mail;

class AppealController extends Controller
{
    /* Display a list of all appeals */
    public function index()
    {
        $query = Appeal::with([
            'violationRecord.user',
            'violationRecord.violationSanction.violation',
            'violationRecord.violationSanction.sanction',
        ]);

        // Search functionality
        if (request('search')) {
            $search = request('search');
            $query->whereHas('violationRecord.user', function ($q) use ($search) {
                $q->where('school_id', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
            })->orWhere('id', 'like', "%{$search}%"); // Search by case ID
        }

        $appeals = $query->orderBy('created_at', 'desc')->paginate(10);

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
            'status_id' => 4, // Set status to 'Dismissed'
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

        $violationRecordRelation = $appeal->violationRecord();

        $violationRecordRelation->update([
            'status_id' => 2, // Set status to 'In progress'
        ]);

        // // Load related user for mailing
        // $appeal->load(['violationRecord.user']);

        // if ($appeal->violationRecord && $appeal->violationRecord->user && $appeal->violationRecord->user->email) {
        //     Mail::to($appeal->violationRecord->user->email)
        //         ->send(new AppealDeniedMail($appeal));
        // }

        return redirect()->route('admin.appeals.index')
            ->with('success', 'Appeal has been rejected and the student has been notified.');
    }
}
