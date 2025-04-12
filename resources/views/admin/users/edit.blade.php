<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
    </div>
    <div>
        <label for="role">Role</label>
        <select name="role">
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="employer" {{ $user->role == 'employer' ? 'selected' : '' }}>Employer</option>
            <option value="worker" {{ $user->role == 'worker' ? 'selected' : '' }}>Worker</option>
        </select>
    </div>
    <button type="submit">Update User</button>
</form>
