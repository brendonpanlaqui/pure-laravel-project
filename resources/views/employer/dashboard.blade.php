@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Employer Dashboard</h2>
    <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Post a New Job</a>

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
