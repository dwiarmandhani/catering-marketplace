<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    id="email"
                                    class="form-control"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    required
                                    autofocus
                                    autocomplete="username"
                                />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input
                                    id="password"
                                    class="form-control"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="form-check mb-3">
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    class="form-check-input"
                                    name="remember"
                                >
                                <label for="remember_me" class="form-check-label">Remember me</label>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                @if (Route::has('password.request'))
                                    <a class="text-muted" href="{{ route('password.request') }}">
                                        Forgot your password?
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-primary">
                                    Log in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
