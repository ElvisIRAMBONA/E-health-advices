<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Health</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="form-container">
        <h2>Welcome to E-Health</h2>

        <!-- Display success or error messages -->
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="inputs-pa-em">
                <!-- Email -->
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <!-- Password -->
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <!-- Remember Me and Forgot Password -->
            <div class="form-options">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
                <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
            </div>
            <button type="submit">Login</button>
        </form>

        <!-- Social Login Options -->
        <div class="social-login">
            <p>Or login with:</p>
            <a href="{{ route('social.login', 'google') }}" class="btn-google">
                <i class="fab fa-google"></i> Google
            </a>
            <a href="{{ route('social.login', 'facebook') }}" class="btn-facebook">
                <i class="fab fa-facebook-f"></i> Facebook
            </a>
        </div>

        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </div>
</body>

</html>