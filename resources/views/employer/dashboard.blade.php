@extends('layouts.app')

@section('content')
    <header class="text-dark py-5 mt-4 mt-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="display-5 fw-bold">Dashboard &middot; Employer</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3 mb-3">
                    <a href="{{ route('jobs.index') }}" class="text-decoration-none">
                        <div class="card bg-primary shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-white">Open Projects:</h4>
                                <h3 id="openCounter" class="card-title text-white">{{ $totalJobs }}</h3>
                            </div>
                        </div>
                    </a>
                    
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <a href="projects.html?status=ongoing" class="text-decoration-none">
                        <div class="card bg-warning shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-dark">Ongoing Projects:</h4>
                                <h3 id="ongoingCounter" class="card-title text-dark">{{ $ongoingProjects }}</h3>
                            </div>
                        </div>
                    </a>
                    
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <a href="projects.html?status=completed" class="text-decoration-none">
                        <div class="card bg-success shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-white">Completed Projects:</h4>
                                <h3 id="completedCounter" class="card-title text-white">{{ $completedProjects }}</h3>
                            </div>
                        </div>
                    </a>
                    
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <a href="{{ route('jobs.create') }}" class="text-decoration-none">
                        <div class="card bg-danger shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-white text-center">Create a new Project</h4>
                                <h3 class="card-title text-white text-center">+</h3>
                            </div>
                        </div>
                    </a>
                    
                </div>

                @foreach ($jobs as $job)
                <div class="col-12 col-md-3 mb-3">
                    <a href="{{ route('jobs.applications', $job->id) }}" class="text-decoration-none">
                        <div class="card bg-secondary shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-white ">View Applicants</h4>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </header>
    <div class="container text-dark py-3">
        <div class="row">
            <div class="container mb-3">
                <h1 class="text-dark display-6 fw-bold">Recent Projects</h1>
                
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-white border-dark border-1">
                            <tr>
                                <th scope="col" class="text-nowrap w-auto">Title</th>
                                <th scope="col" class="text-nowrap w-auto">Type</th>
                                <th scope="col" class="text-nowrap w-auto">Date</th>
                                <th scope="col" class="text-nowrap w-auto">Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-white border-dark border-1" id="recentProjectsTableBody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row mb-4">
        <div class="col">Total Jobs Posted: <strong>{{ $totalJobs }}</strong></div>
        <div class="col">Jobs with Applicants: <strong>{{ $jobsWithApplicants }}</strong></div>
        <div class="col">Ongoing Projects: <strong>{{ $ongoingProjects }}</strong></div>
        <div class="col">Completed Projects: <strong>{{ $completedProjects }}</strong></div>
    </div>

    <h4>Recent Jobs</h4>
    <div class="row">
        @foreach($recentJobs as $job)
            <div class="col-md-4 mb-3">
                <div class="card p-2">
                    <h5>{{ $job->title }}</h5>
                    <p>Posted: {{ $job->created_at->format('F j, Y') }}</p>
                    @if($job->status === 'Open')
                        <span class="badge bg-primary">Open</span>
                    @elseif($job->status === 'In progress')
                        <span class="badge bg-warning text-dark">In Progress</span>
                    @elseif($job->status === 'Completed')
                        <span class="badge bg-success">Completed</span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <h3>Your Job Listings</h3>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="{{ route('jobs.index', $job->id) }}">{{ $job->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
