<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hypertension - E-Health</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-image: url("{{ asset('images/images.jpeg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: #333;
    }

    .content {
        background: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 8px;
        margin: 20px auto;
        max-width: 800px;
    }
    </style>
</head>

<body>
    @include('partials.navbar')



    <div class="content mt-5">
        <h1>Understanding Hypertension</h1>
        <p>Hypertension, also known as high blood pressure, is a common condition that can lead to serious health issues
            if left untreated.</p>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->namep }}" class="card-img-top"
                        alt="{{ $product->namep }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->namep }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->namep }}" class="card-img-top"
                        alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->namep }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h3>Symptoms of Hypertension</h3>
        <ul>
            <li>Headaches</li>
            <li>Shortness of breath</li>
            <li>Nosebleeds</li>
            <li>Flushing</li>
            <li>Dizziness</li>
            <li>Chest pain</li>
            <li>Visual changes</li>
        </ul>
    </div>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>