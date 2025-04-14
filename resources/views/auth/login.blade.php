@extends('layouts.app')

@section('content')
    <div class="bg-light min-vh-100">
        <header class="text-dark text-start py-3 pt-md-5">
            <div class="container d-flex flex-column">
                <div class="col-7 col-md-12">
                    <h1 class="d-none d-md-flex justify-content-md-center display-4 fw-bold">
                        <span class="text-primary">Opportunities&nbsp;</span> <span>lie here.</span>
                    </h1>
                    <h2 class="d-md-none display-5 fw-bold">
                        <span class="text-primary">Opportunities&nbsp;</span> <span>lie here.</span>
                    </h2>
                </div>
                <div class="col-12">
                    <p class="d-none d-md-flex justify-content-md-center">
                        Don't have an account yet?&nbsp;
                        <a class="text-dark" href="{{ route('register') }}"><span>Let's sign you up</span></a>.
                    </p>
                    <p class="d-md-none">
                        Don't have an account yet?&nbsp;
                        <a class="text-dark" href="{{ route('register') }}"><span>Let's sign you up</span></a>.
                    </p>
                </div>
            </div>
        </header>

        <button type="button" onclick="window.history.back()" class="btn btn-light position-absolute top-0 end-0 m-3 border-0 fs-4" aria-label="Close">
            <i class="bi bi-x-lg"></i>
        </button>

        <!-- Desktop -->
        <div class="d-flex justify-content-center py-md-5 d-none d-md-flex">
            <div class="card shadow-sm" style="max-width: 400px; width: 100%;">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-dark text-start">
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <input type="text" class="form-control border-dark fw-bold @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <div class="input-group">
                                    <input id="passwordInput" type="password" class="form-control border-dark fw-bold @error('password') is-invalid @enderror" name="password" required>
                                    <button class="input-group-text bg-white border-dark" style="border-left: none; cursor: pointer;" type="button" onclick="togglePassword('passwordInput')">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (Route::has('password.request'))
                                <div class="mb-2">
                                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif
                            <div class="mb-3">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mobile -->
        <div class="container d-flex py-md-5 d-md-none">
            <div class="text-dark text-start w-100">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email_mobile" class="form-label fw-bold">Email</label>
                        <input type="text" class="form-control border-dark fw-bold @error('email') is-invalid @enderror" id="email_mobile" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_mobile" class="form-label fw-bold">Password</label>
                        <div class="input-group">
                            <input id="passwordInputMobile" type="password" class="form-control border-dark fw-bold @error('password') is-invalid @enderror" name="password" required>
                            <button class="input-group-text bg-white border-dark" style="border-left: none; cursor: pointer;" type="button" onclick="togglePassword('passwordInputMobile')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    @if (Route::has('password.request'))
                            <div class="mb-2">
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                        <div class="mb-3">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
@endsection
