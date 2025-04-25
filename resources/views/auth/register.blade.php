@extends('layouts.app')

@section('content')
    <header class="text-dark pt-5 pb-3 mt-4 mt-md-5">
        <div class="container d-flex flex-column">
            <div class="col-12">
                <h2 class="display-4 fw-bold text-start text-md-center">Join the Community</h2>
                <p class="text-md-center">
                    Already have an account?&nbsp;
                    <a class="text-dark" href="{{ route('login') }}"><span>Let's login</span></a>
                </p>
            </div>
        </div>
    </header>

    <!-- Desktop Card -->
    <div class="d-flex justify-content-center py-md-5 d-none d-md-flex">
        <div class="card shadow-sm" style="max-width: 400px; width: 100%;">
            <div class="card-body">
                @includeWhen(session('success'), 'components.success-message')
                @includeWhen(session('error'), 'components.error-message')
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">First Name</label>
                        <input type="text" class="form-control border-dark fw-bold @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required>
                        @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Last Name</label>
                        <input type="text" class="form-control border-dark fw-bold @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>
                        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control border-dark fw-bold @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" class="form-control border-dark fw-bold @error('password') is-invalid @enderror" name="password" required>
                            <button type="button" class="input-group-text bg-white border-dark" onclick="togglePassword('password')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" id="password_confirmation" class="form-control border-dark fw-bold" name="password_confirmation" required>
                            <button type="button" class="input-group-text bg-white border-dark" onclick="togglePassword('password_confirmation')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label fw-bold">Register as</label>
                        <select name="role" class="form-select border-dark fw-bold" required>
                            <option value="worker" {{ old('role') == 'worker' ? 'selected' : '' }}>Worker</option>
                            <option value="employer" {{ old('role') == 'employer' ? 'selected' : '' }}>Employer</option>
                        </select>
                        @error('role') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex my-5 justify-content-center">
                        <button type="submit" class="btn btn-danger w-75">Create my Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Mobile Layout -->
    <div class="container d-flex py-md-5 d-md-none">
        <div class="text-dark text-start w-100">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control border-dark fw-bold @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control border-dark fw-bold @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <div class="input-group">
                        <input type="password" id="password2" class="form-control border-dark fw-bold @error('password') is-invalid @enderror" name="password" required>
                        <button type="button" class="input-group-text bg-white border-dark" onclick="togglePassword('password2')">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" id="password_confirmation2" class="form-control border-dark fw-bold" name="password_confirmation" required>
                        <button type="button" class="input-group-text bg-white border-dark" onclick="togglePassword('password_confirmation2')">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label fw-bold">Register as</label>
                    <select name="role" class="form-select border-dark fw-bold" required>
                        <option value="worker" {{ old('role') == 'worker' ? 'selected' : '' }}>Worker</option>
                        <option value="employer" {{ old('role') == 'employer' ? 'selected' : '' }}>Employer</option>
                    </select>
                    @error('role') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary w-100" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
@endsection
