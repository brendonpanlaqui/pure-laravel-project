@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4>Welcome, {{ Auth::user()->name }}!</h4>
            <p>You are logged in as a <strong>worker</strong>.</p>
        </div>
    </div>

    <div class="mt-4">
        <h2 class="mb-4">Available Jobs</h2>
        <form method="GET" action="{{ route('worker.dashboard') }}" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by title..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="category" class="form-select">
                    <option value="all">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('worker.dashboard') }}" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jobs as $job)
                <tr>
                    <td><a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a></td>
                    <td>{{ $job->category }}</td>
                    <td>{{ $job->location }}</td>
                    <td>₱{{ number_format($job->salary) }}</td>
                    @php
                        $hasApplied = \App\Models\JobApplication::where('job_id', $job->id)
                                    ->where('worker_id', Auth::id())
                                    ->exists();
                    @endphp
                    <td>
                        @if (!$hasApplied)
                            <form action="{{ route('jobs.apply', $job) }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm">Apply</button>
                            </form>
                        @else
                            <span class="badge bg-secondary">Already Applied</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No jobs found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $jobs->links() }}
        </div>
</div>
@endsection
