<!-- resources/views/admin/applications/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Applications</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Job</th>
                <th>User</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
            <tr>
                <td>{{ $application->job->title }}</td>
                <td>{{ $application->worker->name }}</td>
                <td>{{ $application->status }}</td>
                <td>
                    <a href="{{ route('admin.applications.view', $application) }}" class="btn btn-info btn-sm">View</a>
                    <form action="{{ route('admin.applications.update', $application) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select">
                            <option value="accepted">Accept</option>
                            <option value="rejected">Reject</option>
                        </select>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
