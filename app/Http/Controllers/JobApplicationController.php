<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class JobApplicationController extends Controller {
    public function apply(Request $request, Job $job) {
        $request->validate([
            'cover_letter' => 'nullable|string',
        ]);

        // Check if the use has already applied to this job
        $alreadyApplied = JobApplication::where('job_id', $job->id)->where('worker_id', Auth::id())->exists();

        if ($alreadyApplied) {
            return redirect()->route('worker.dashboard')->with('error', 'You have already applied for this job.');
        }
    
        JobApplication::create([
            'job_id' => $job->id,
            'worker_id' => Auth::id(),
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);
    
        return redirect()->route('worker.dashboard')->with('success', 'Application submitted!');
    }
    
    public function employerViewApplications(Job $job) {
        $applications = $job->applications()->with('worker')->get();
        return view('applications.index', compact('applications', 'job'));
    }

    public function updateStatus(JobApplication $application, Request $request) {
        $request->validate(['status' => 'required|in:accepted,rejected']);

        $application->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Application updated!');
    }
}
