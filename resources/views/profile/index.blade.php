@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Profile</h2>
    <div class="card">
        <div class="card-body">
            @if($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="img-thumbnail" width="150">
            @else
                <img src="{{ asset('default.png') }}" alt="Default Profile" class="img-thumbnail" width="150">
            @endif
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Specialties:</strong> {{ $user->specialties ?? 'N/A' }}</p>
            <p><strong>Bio:</strong> {{ $user->bio ?? 'No bio available' }}</p>
            <p><strong>Contact:</strong> {{ $user->contact_number ?? 'N/A' }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
