<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class WorkerController extends Controller{
    public function dashboard(Request $request) {
        $query = Job::query()->where('status', 'open');

        // Search 
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by Category
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        $jobs = $query->latest()->paginate(10)->withQueryString();
        $categories = Job::distinct()->pluck('category');

        return view('worker.dashboard', compact('jobs', 'categories'));
    }
}
