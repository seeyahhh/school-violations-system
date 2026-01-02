<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $violationRecord = $user->violationRecord()->latest()->get();
        $violation_count = $violationRecord->count();

        $data = [
            'user' => $user,
            'violation_count' => $violation_count,
            'violation_record' => $violationRecord,
        ];

        // compact data to frontend soon
        return view('student.dashboard');
    }
}
