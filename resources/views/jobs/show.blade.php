@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $job->title }}</h2>
    <p><strong>Location:</strong> {{ $job->location }}</p>
    <p><strong>Salary:</strong> {{ $job->salary ? '$' . $job->salary : 'Not specified' }}</p>
    <p><strong>Description:</strong> {{ $job->description }}</p>

    @if(Auth::user()->role == 'worker')
    <form action="{{ route('jobs.apply', $job) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cover_letter" class="form-label">Cover Letter (Optional)</label>
            <textarea class="form-control" id="cover_letter" name="cover_letter"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Apply</button>
    </form>
    @endif

    @if(Auth::user()->role === 'employer')

        <a href="{{ route('jobs.applications', $job) }}" class="btn btn-primary mb-3">View Applications</a>
    @endif

</div>
@endsection
