<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=20261007">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/pages/admin-login.css') }}">
</head>
<body>
    <div class="login-shell">
        <div class="login-box">
            <h1>Admin Login</h1>

            @if ($errors->any())
                <div class="error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="field">
                    <label for="username">Username or Email</label>
                    <input id="username" name="username" type="text" value="{{ old('username') }}" required>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" required>
                </div>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
