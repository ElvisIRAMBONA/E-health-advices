<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancer - E-Health</title>
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
        max-width: 1000px;
    }

    .card-img-top {
        max-height: 250px;
        object-fit: cover;
    }
    </style>
</head>

<body>

    @include('partials.navbar')




    <div class="content mt-5">
        <h1>Understanding Cancer</h1>
        <p>Cancer is a group of diseases characterized by the uncontrolled growth and spread of abnormal cells.</p>

        <h3>Symptoms of Cancer</h3>
        <ul>
            <li>Unexplained weight loss</li>
            <li>Fever</li>
            <li>Fatigue</li>
            <li>Pain</li>
            <li>Skin changes</li>
            <li>Changes in bowel or bladder function</li>
        </ul>

        <h3>Health Products for Cancer</h3>
        <p>Explore our range of products designed to help manage cancer:</p>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->namep }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h3>Additional Products</h3>
        <div class="row">
            @foreach ($products as $product)
            <!-- Sample Product 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->namep }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->namep }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Sample Product 2 -->
            @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->namep }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->namep }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach ($products as $product)
            <!-- Sample Product 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->namep }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->namep }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ url('/products/' . $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('partials.footer')
    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>

</html>