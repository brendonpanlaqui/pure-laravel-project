@extends('layouts.app')

@section('content')
<body class="bg-light">
    <header class="text-dark text-start py-3 pt-md-5">
        <div class="container d-flex flex-column">
            <div class="col-7 col-md-12">
                <h1 class="d-none d-md-flex justify-content-md-center display-4 fw-bold"><span>Join the&nbsp;</span> <span class="text-primary">Community.</span></h1>
                <h2 class="d-md-none display-5 fw-bold"><span>Join the&nbsp;</span> <span class="text-primary">Community.</span></h2>
            </div>
            <div class="col-12">
                <p class="d-none d-md-flex justify-content-md-center">
                    Already a part of us?&nbsp;
                    <a class="text-dark" href="{{ route('login') }}"><span>Let's login to your account, then</span></a>.
                </p>
                <p class="d-md-none">
                    Already a part of us?&nbsp;
                    <a class="text-dark" href="{{ route('login') }}"><span>Let's login to your account, then</span></a>.
                </p>
            </div>
        </div>
    </header>

    <button type="button" onclick="window.history.back()" class="btn btn-light position-absolute top-0 end-0 m-3 border-0 fs-4" aria-label="Close">
        <i class="bi bi-x-lg"></i>
    </button>

    <!-- Desktop Card -->
    <div class="d-flex justify-content-center py-md-5 d-none d-md-flex">
        <div class="card shadow-sm" style="max-width: 400px; width: 100%;">
            <div class="card-body">
                @includeWhen(session('success'), 'components.success-message')
                @includeWhen(session('error'), 'components.error-message')
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

                    <div class="mb-3">
                        <button class="btn btn-primary w-100" type="submit">Register</button>
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
</body>
@endsection
