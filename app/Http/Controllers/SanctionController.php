<?php

namespace App\Http\Controllers;

use App\Models\Sanction;
use Illuminate\Http\Request;

class SanctionController extends Controller
{
    public function index()
    {
        $sanctions = Sanction::select('id', 'sanction_name')->latest()->get();
        $sanctionCount = $sanctions->count();

        return view('sanction', compact('sanctions', 'sanctionCount'));
    }
}
