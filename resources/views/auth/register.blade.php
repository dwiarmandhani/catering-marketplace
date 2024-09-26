<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input
                                    id="name"
                                    class="form-control"
                                    type="text"
                                    name="name"
                                    :value="old('name')"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

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
                                    autocomplete="new-password"
                                />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input
                                    id="password_confirmation"
                                    class="form-control"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <!-- Role Selection -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="customer">Customer</option>
                                    <option value="merchant">Merchant</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a class="text-muted" href="{{ route('login') }}">
                                    Already registered?
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Register
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
