<!-- resources/views/admin/jobs/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Jobs</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->title }}</td>
                <td>{{ $job->status }}</td>
                <td>
                    <a href="{{ route('admin.jobs.edit', $job) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.jobs.delete', $job) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
