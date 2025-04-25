<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller {
    public function create($userId) {
        $reportedUser = User::findOrFail($userId);
        return view('reports.create', compact('reportedUser'));
    }

    public function store(Request $request) {
        $request->validate([
            'reportable_id' => 'required',
            'reportable_type' => 'required',
            'reason' => 'required|string|max:1000',
        ]);

        Report::create([
            'reporter_id' => auth()->id(),
            'reportable_id' => $request->reportable_id,
            'reportable_type' => $request->reportable_type,
            'reason' => $request->reason,
        ]);

        return back()->with('success', 'Report submitted successfully.');
    }
}
