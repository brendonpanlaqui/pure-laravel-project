@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <!-- Dashboard links for admin management -->
    <div class="row">
        <!-- Manage Users -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">View and update users, change their roles, or delete accounts.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Go to Users</a>
                </div>
            </div>
        </div>

        <!-- Manage Jobs -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Jobs</h5>
                    <p class="card-text">Create, edit, or delete job listings.</p>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-primary">Go to Jobs</a>
                </div>
            </div>
        </div>

        <!-- Manage Applications -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Applications</h5>
                    <p class="card-text">View job applications submitted by workers.</p>
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-primary">Go to Applications</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
