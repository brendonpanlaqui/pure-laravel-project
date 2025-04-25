<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(Request $request) {
        $status = $request->query('status', 'open');
        $jobs = Job::where('status', $status)->get();

        return view('jobs.index', compact('jobs', 'status'));
    }

    public function create() {
        return view('jobs.create');
    }

    public function show(Job $job) {   
        $hasApplied = \App\Models\JobApplication::where('job_id', $job->id)->where('worker_id', Auth::id())->exists();

        return view('jobs.show', compact('job', 'hasApplied'));
    }   


    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'type' => 'required|string|in:Online,Offline',
            'platform' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'time_estimate' => 'required|string|max:255',
            'expertise_level' => 'required|string|in:Entry,Immediate,Expert',
            'salary' => 'nullable|numeric|min:0',
            'description' => 'required|string',
        ]);

        Job::create([
            'employer_id' => Auth::id(),
            'title' => $validatedData['title'],
            'category' => $validatedData['category'],
            'type' => $validatedData['type'],
            'platform' => $validatedData['platform'] ?? null, // nullable if not provided
            'location' => $validatedData['location'] ?? null, // nullable if not provided
            'time_estimate' => $validatedData['time_estimate'],
            'expertise_level' => $validatedData['expertise_level'],
            'salary' => $validatedData['salary'] ?? null, // nullable if not provided
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully.');
    }

    public function employerDashboard() {
        $jobs = Job::where('employer_id', Auth::id())->get();
        $employerId = Auth::id();

        // Total counts
        $totalJobs = Job::where('employer_id', $employerId)->count();
        $jobsWithApplicants = Job::where('employer_id', $employerId)
                                ->has('applications') // assumes Job has applications() relationship
                                ->count();
        $ongoingProjects = Job::where('employer_id', $employerId)
                            ->where('status', 'In progress')
                            ->count();
        $completedProjects = Job::where('employer_id', $employerId)
                                ->where('status', 'Completed')
                                ->count();

        // Recent jobs list
        $recentJobs = Job::where('employer_id', $employerId)
                        ->latest()
                        ->take(5)
                        ->get();

        return view('employer.dashboard', compact(
            'totalJobs',
            'jobsWithApplicants',
            'ongoingProjects',
            'completedProjects',
            'recentJobs',
            'jobs',
        ));
    }    
}
