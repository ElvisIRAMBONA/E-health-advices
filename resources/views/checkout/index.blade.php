<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your CSS -->
</head>

<body>

    <div class="container mt-5">
        <h1>Checkout</h1>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group mt-3">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group mt-3">
                <label for="address">Shipping Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="form-group mt-3">
                <label for="payment_method">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">Lumicash</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="card_number">Card Number</label>
                <input type="text" class="form-control" id="card_number" name="card_number" required>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Place Order</button>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script> <!-- Link to your JS -->
</body>

</html>