@extends('layouts.app')

@section('content')
    <header class="text-dark pt-5 pb-3 mt-4 mt-md-5">
        <div class="container d-flex flex-column">
            <div class="col-12">
                <h2 class="display-4 fw-bold text-start text-md-center">Login to your account</h2>
                <p class="text-md-center">
                    Don't have an account?&nbsp;
                    <a class="text-dark" href="{{ route('register') }}"><span>Join now</span></a>
                </p>
            </div>
        </div>
    </header>



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
                                <button class="btn btn-danger w-100" type="submit">Login</button>
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
