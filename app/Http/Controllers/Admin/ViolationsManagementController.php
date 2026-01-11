<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ViolationRecord;
use App\Models\ViolationSanction;
use Carbon\Carbon;

class ViolationsManagementController extends Controller
{
    public function index() {

        $violationRecords = ViolationRecord::all();

        $violationRecordCount = ViolationRecord::all()->count();

        return view('admin.violations-management', compact('violationRecords'));
    }
}
