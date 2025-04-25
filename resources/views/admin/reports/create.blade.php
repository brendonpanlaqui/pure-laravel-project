@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Report {{ $reportedUser->name }}</h2>

    <form method="POST" action="{{ route('report.user.store', $reportedUser->id) }}">
        @csrf

        <div class="mb-3">
            <label for="reason" class="form-label">Reason</label>
            <input type="text" class="form-control" id="reason" name="reason" required>
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Details (optional)</label>
            <textarea class="form-control" id="details" name="details"></textarea>
        </div>

        <button type="submit" class="btn btn-danger">Submit Report</button>
    </form>
</div>
@endsection
