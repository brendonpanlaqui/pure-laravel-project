@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Worker Dashboard</h1>

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
        <h3>Available Jobs</h3>
        @if($jobs->count() > 0)
            <ul class="list-group">
                @foreach($jobs as $job)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a>
                            <span class="text-muted"> - {{ $job->location }}</span>
                        </div>
                        <form action="{{ route('jobs.apply', $job->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Apply Now</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No jobs available at the moment.</p>
        @endif
    </div>
    
</div>
@endsection
