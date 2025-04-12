@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Job Listings</h2>

    <!-- Show Post Job button only for Employers -->
    @if(Auth::user()->role === 'employer')
        <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Post a Job</a>
    @endif

    <div class="row">
        @foreach ($jobs as $job)
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $job->title }}</h5>
                    <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                    <p><strong>Location:</strong> {{ $job->location }}</p>
                    <p><strong>Salary:</strong> {{ $job->salary ? '$' . $job->salary : 'Not specified' }}</p>
                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
