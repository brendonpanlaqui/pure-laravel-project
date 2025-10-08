@extends('layouts.app')

@section('content')
<div class="container">
    <h2 id="projectStatusTitle">
        {{ ucfirst(request('status') ?? 'open') }} Projects
    </h2>

    <div class="row">
        @forelse ($jobs as $index => $job)
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#project-{{ $index }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $job->title }}</h5>
                    <p><strong>Status:</strong> {{ ucfirst($job->status) }}</p>
                    <p><strong>Date:</strong> {{ $job->created_at->format('Y-m-d') }}</p>

                    <div class="collapse mt-3" id="project-{{ $index }}">
                        <hr>
                        <p><strong>Category:</strong> {{ $job->category ?? 'N/A' }}</p>
                        <p><strong>Time:</strong> {{ $job->created_at->diffForHumans() ?? 'N/A' }}</p>
                        <p><strong>Expertise:</strong> {{ $job->expertise_level ?? 'N/A' }}</p>
                        <p><strong>Type:</strong> {{ $job->type ?? 'N/A' }}</p>
                        <p><strong>Description:</strong> {{ $job->description }}</p>
                        <p><strong>Salary:</strong> ₱{{ $job->salary }}</p>
                        <p><strong>Location:</strong> {{ $job->location }}</p>
                        @if(strtolower($job->type) === 'online')
                            <p><strong>Platform:</strong> {{ $job->platform ?? 'N/A' }}</p>
                            <p><strong>Transaction Mode:</strong> {{ $job->transaction_mode ?? 'N/A' }}</p>
                        @else
                            <p><strong>Site of Operation:</strong> {{ $job->site ?? 'N/A' }}</p>
                            <p><strong>Transaction Mode:</strong> {{ $job->transaction_mode ?? 'N/A' }}</p>
                        @endif

                        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-info mt-2">View Full Details</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">No projects found.</div>
        </div>
        @endforelse
    </div>
</div>
@endsection

<script src="{{ asset('js/projects.js') }}"></script>