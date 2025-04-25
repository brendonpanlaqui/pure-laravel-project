@extends('admin.dashboard')

@section('content')
<div class="container mt-4">
    <h3>Report Details</h3>

    <div class="card">
        <div class="card-body">
            <p><strong>Reporter:</strong> {{ $report->reporter->name ?? '[Deleted User]' }}</p>
            <p><strong>Reported Type:</strong> {{ class_basename($report->reportable_type) }}</p>
            <p><strong>Reported ID:</strong> {{ $report->reportable->id ?? '[Deleted]' }}</p>
            <p><strong>Reason:</strong> {{ $report->reason }}</p>
            <p><strong>Created:</strong> {{ $report->created_at->format('F j, Y - g:i A') }}</p>
        </div>
    </div>
    <form action="{{ route('admin.reports.status', $report->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <label for="status">Update Status:</label>
        <select name="status" id="status" class="form-select w-25 d-inline-block">
            @foreach(\App\Models\Report::STATUSES as $status)
                <option value="{{ $status }}" {{ $report->status === $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
        <button class="btn btn-primary btn-sm">Update</button>
    </form>
    <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary mt-3">Back to Reports</a>
</div>
@endsection
