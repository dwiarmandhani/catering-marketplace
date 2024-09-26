<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password</title>
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h4>{{ __('Confirm Password') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                        </div>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <!-- Password -->
                            <div>
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input
                                    id="password"
                                    class="form-control block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="flex justify-end mt-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm') }}
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
