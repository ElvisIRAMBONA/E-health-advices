<!-- resources/views/terms.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
    <link rel="stylesheet" href="{{ asset('css/terms.css') }}">
</head>

<body>
    @include('partials.navbar')




    <div class="container">
        <h1>Terms and Conditions</h1>
        <p>Welcome to our Terms and Conditions page. Please read these terms carefully before using our services.</p>

        <h2>1. Acceptance of Terms</h2>
        <p>By accessing or using our service, you agree to be bound by these terms and all applicable laws.</p>

        <h2>2. Use of Service</h2>
        <p>Our service is provided for personal and commercial use. You agree not to misuse the service or help anyone
            else to do so.</p>

        <h2>3. User Responsibilities</h2>
        <p>As a user, you are responsible for any activity that occurs under your account. Keep your password secure.
        </p>

        <h2>4. Changes to Terms</h2>
        <p>We reserve the right to modify these terms at any time. Please review these terms periodically for updates.
        </p>

        <h2>5. Contact Us</h2>
        <p>If you have any questions or concerns about these terms, please contact us at support@example.com.</p>
    </div>
    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>