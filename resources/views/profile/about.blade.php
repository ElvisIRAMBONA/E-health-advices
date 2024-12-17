<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - E-Health</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {

        background-image: url("{{ asset('images/foods-healthy-thyroid-variety-natural-260nw-2351005789.webp') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
    }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">E-Health</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center mb-4">About E-Health</h1>
                <p class="lead text-center">
                    Welcome to E-Health, your trusted partner in personalized health solutions. Our mission is to
                    empower individuals to take control of their health through accurate, accessible, and personalized
                    health advice.
                </p>
                <div class="text-center">
                    <img src="{{ asset('images/foods-healthy-thyroid-variety-natural-260nw-2351005789.webp') }}"
                        alt="About E-Health" class="img-fluid my-4" style="max-width: 100%; height: auto;">
                </div>
                <h3>Our Mission</h3>
                <p>
                    At E-Health, we understand that health is not one-size-fits-all. Every individual has unique health
                    needs, and we are committed to offering personalized recommendations to help you manage and improve
                    your health. Whether you are looking for advice on managing chronic conditions like hypertension,
                    diabetes, or cancer, or simply looking for tips on maintaining a healthy lifestyle, E-Health is here
                    for you.
                </p>

                <h3>What We Offer</h3>
                <ul>
                    <li>Personalized health recommendations based on your condition.</li>
                    <li>Up-to-date information on chronic diseases such as Hypertension, Diabetes, and Cancer.</li>
                    <li>A wide range of health products tailored to your needs.</li>
                    <li>Expert advice to help you take charge of your well-being.</li>
                </ul>

                <h3>Why Choose Us?</h3>
                <p>
                    We believe that the future of healthcare is personalized. At E-Health, we leverage technology and
                    expert knowledge to provide the right solutions for you. Our platform is easy to use, secure, and
                    designed with your health and well-being in mind.
                </p>

                <h3>Our Vision</h3>
                <p>
                    Our vision is to become the leading platform for personalized health solutions, enabling individuals
                    across the world to live healthier, happier lives.
                </p>

                <h3>Contact Us</h3>
                <p>
                    Have questions or want to learn more about how E-Health can help you? Feel free to <a
                        href="{{ url('/contact') }}">contact us</a>. We’re here to help!
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')


    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>