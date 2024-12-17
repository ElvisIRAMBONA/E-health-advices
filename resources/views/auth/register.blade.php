<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="form-container">
        <h2>Register on E-health</h2>

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

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Full Name -->
            <input type="text" name="name" placeholder="First Name" value="{{ old('first_name') }}" required>
            <!-- Surname -->
            <input type="text" name="surname" placeholder="Surname" value="{{ old('surname') }}" required>
            <!-- Email Address -->
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <!-- Password -->
            <input type="password" name="password" placeholder="Password" required>
            <!-- Confirm Password -->
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
</body>

</html>