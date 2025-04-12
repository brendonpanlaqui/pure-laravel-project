@extends('layouts.app')

@section('content')
    <h2>Applications for {{ $job->title }}</h2>

    <ul class="list-group">
        @foreach($applications as $application)
            <li class="list-group-item">
                <strong>{{ $application->worker->name }}</strong> - {{ $application->status }}
                <p>{{ $application->cover_letter }}</p>

                <form action="{{ route('applications.update', $application) }}" method="POST">
                    @csrf
                    <select name="status" class="form-select">
                        <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
