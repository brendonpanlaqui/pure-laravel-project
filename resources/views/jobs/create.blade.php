@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Post a Job</h2>
    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Salary (Optional)</label>
            <input type="number" name="salary" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Post Job</button>
    </form>
</div>
@endsection
