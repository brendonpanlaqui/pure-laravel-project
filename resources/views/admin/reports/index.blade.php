@extends('admin.dashboard')

@section('content')
<div class="container mt-4">
    <h3>All Reports</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Reporter</th>
                <th>Type</th>
                <th>Item ID</th>
                <th>Reason</th>
                <th>Submitted</th>
                <th>Actions</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->reporter->name ?? '[Deleted User]' }}</td>
                    <td>{{ class_basename($report->reportable_type) }}</td>
                    <td>{{ $report->reportable->id ?? '[Deleted]' }}</td>
                    <td>{{ Str::limit($report->reason, 50) }}</td>
                    <td>{{ $report->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('admin.reports.view', $report->id) }}" class="btn btn-sm btn-info">View</a>
                        <form action="{{ route('admin.reports.delete', $report->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this report?')">Delete</button>
                        </form>
                    </td>
                    <td>
                        <span class="badge 
                            {{ $report->status === 'Pending' ? 'bg-warning' : 
                            ($report->status === 'Reviewed' ? 'bg-info' : 'bg-success') }}">
                            {{ $report->status }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $reports->links() }}
</div>
@endsection
