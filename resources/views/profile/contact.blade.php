<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - E-Health</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Your main CSS file -->
    <style>
    body {
        background-image: url("{{ asset('images/images.jpeg') }}");
        /* Optional background image */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        color: #333;
        /* Change text color for contrast */
    }


    .contact-form {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background: rgba(255, 255, 255, 0.9);
        /* Semi-transparent white background */
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    h1 {
        text-align: center;
    }
    </style>
</head>

<body>
    @include('partials.navbar')
    <div class="contact-form">
        <h1>Contact Us</h1>
        <p>If you have questions about our health products or need assistance, please fill out the form below:</p>
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="product">Product Inquiry:</label>
                <select class="form-control" id="product" name="product">
                    <option value="">Select a product...</option>
                    <option value="supplements">Supplements</option>
                    <option value="herbal-teas">Herbal Teas</option>
                    <option value="healthy-snacks">Healthy Snacks</option>
                    <option value="meal-plans">Meal Plans</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
    @include('partials.footer')
</body>

</html>