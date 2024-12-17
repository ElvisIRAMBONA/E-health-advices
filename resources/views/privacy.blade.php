{{-- resources/views/privacy.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <link rel="stylesheet" href="{{ asset('css/privacy.css') }}"> <!-- Link to your CSS file if needed -->
</head>

<body>
    @include('partials.navbar')
    <div class="container">
        <h1>Privacy Policy</h1>

        <p>Welcome to our Privacy Policy page. Here you’ll find information on how we handle your personal data.</p>

        <h2>1. Information We Collect</h2>
        <p>We collect various types of information to provide and improve our services, including:</p>
        <ul>
            <li>Personal Identification Information (such as name, email address, phone number, etc.)</li>
            <li>Usage Data (including how you use our services, visited pages, and other behavioral data)</li>
        </ul>

        <h2>2. How We Use Your Information</h2>
        <p>We may use the information we collect for purposes such as:</p>
        <ul>
            <li>Providing and maintaining our services</li>
            <li>Improving our website and services</li>
            <li>Communicating with you about updates or important information</li>
        </ul>

        <h2>3. Sharing Your Information</h2>
        <p>We do not share your personal information with third parties except as necessary to provide our services or
            comply with legal obligations.</p>

        <h2>4. Security of Your Information</h2>
        <p>We take data protection seriously and implement reasonable measures to protect your information.</p>

        <h2>5. Your Data Protection Rights</h2>
        <p>Depending on your location, you may have rights such as access to, correction of, or deletion of your
            personal data.</p>

        <h2>6. Contact Us</h2>
        <p>If you have questions or concerns about this Privacy Policy, please contact us at <a
                href="presira857@gmail.com">presira857@gmail.com</a>.</p>

        <p>Thank you for trusting us with your information.</p>
    </div>
    @include('partials.footer')
</body>

</html>