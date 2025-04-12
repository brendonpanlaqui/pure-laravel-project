<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Manage Users
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // Manage Jobs
    public function manageJobs()
    {
        $jobs = Job::all();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function editJob(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function updateJob(Request $request, Job $job)
    {
        $job->update($request->all());
        return redirect()->route('admin.jobs')->with('success', 'Job updated successfully.');
    }

    public function deleteJob(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs')->with('success', 'Job deleted successfully.');
    }

    // Manage Applications
    public function manageApplications()
    {
        $applications = JobApplication::all();
        return view('admin.applications.index', compact('applications'));
    }

    public function viewApplication(JobApplication $application)
    {
        return view('admin.applications.view', compact('application'));
    }

    public function updateApplicationStatus(Request $request, JobApplication $application)
    {
        $application->status = $request->status;
        $application->save();
        return redirect()->route('admin.applications')->with('success', 'Application status updated.');
    }
}
