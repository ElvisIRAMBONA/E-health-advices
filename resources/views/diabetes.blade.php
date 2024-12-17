<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Diabetes - E-Health, products to manage diabetes, symptoms, and more">
    <meta name="author" content="E-Health">
    <meta property="og:title" content="Diabetes - E-Health">
    <meta property="og:image" content="{{ asset('images/diabetes-banner.jpg') }}">
    <meta property="og:description" content="Learn about diabetes and explore products designed to manage diabetes.">
    <title>Diabetes - E-Health</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-image: url("{{ asset('images/images.jpeg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: #333;
        font-family: Arial, sans-serif;
    }

    .content {
        background: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 8px;
        margin: 20px auto;
        max-width: 800px;
    }

    h1,
    h3 {
        color: #4CAF50;
    }

    .card-body {
        text-align: center;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .navbar-nav .nav-link {
        color: #333 !important;
    }

    .navbar-nav .nav-link:hover {
        color: #4CAF50 !important;
    }

    .navbar-light .navbar-toggler-icon {
        background-color: #4CAF50;
    }
    </style>
</head>

<body>

    @include('partials.navbar')


    <div class="content mt-5">
        <h1>Understanding Diabetes</h1>
        <p>Diabetes is a chronic condition that occurs when the body cannot effectively process food for use as energy.
        </p>

        <div class="row">
            @forelse ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->namep }}" class="card-img-top"
                        alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
            @empty
            <p>No products available at the moment.</p>
            @endforelse
        </div>

        <h3>Symptoms of Diabetes</h3>
        <ul>
            <li>Increased thirst</li>
            <li>Frequent urination</li>
            <li>Extreme fatigue</li>
            <li>Blurred vision</li>
            <li>Slow-healing sores</li>
            <li>Unexplained weight loss</li>
        </ul>

        <h3>Health Products for Diabetes</h3>
        <p>Explore our range of products designed to help manage diabetes:</p>

        <div class="row">
            <!-- Sample Product 1 -->
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
            <!-- Sample Product 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->namep }}" class="card-img-top"
                        alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
            <!-- Sample Product 3 -->
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
        </div>
    </div>

    @include('partials.footer')

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>