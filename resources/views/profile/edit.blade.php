@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Specialties:</label>
            <input type="text" name="specialties" class="form-control" value="{{ old('specialties', $user->specialties) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Bio:</label>
            <textarea name="bio" class="form-control">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Number:</label>
            <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number', $user->contact_number) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Profile Photo:</label>
            <input type="file" name="profile_photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>
</div>
@endsection
