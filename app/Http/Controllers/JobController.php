<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::where('status', 'open')->get();
        return view('jobs.index', compact('jobs'));
    }

    public function create() {
        return view('jobs.create');
    }

    public function show(Job $job) {   
        $hasApplied = \App\Models\JobApplication::where('job_id', $job->id)->where('worker_id', Auth::id())->exists();

        return view('jobs.show', compact('job', 'hasApplied'));
    }   


    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric'
        ]);

        Job::create([
            'employer_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully.');
    }

    public function employerDashboard() {
        $jobs = Job::where('employer_id', Auth::id())->get();
        return view('employer.dashboard', compact('jobs'));
    }    
}
