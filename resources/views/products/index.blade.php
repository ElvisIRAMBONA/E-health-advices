<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @include('partials.navbar')



    @extends('layouts.app')

    @section('title', 'Home Page')


    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}"
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['namep'] }}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <p class="card-text"><strong>${{ $product['price'] }}</strong></p>
                        <a href="#" class="btn btn-primary">Buy now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @include('partials.footer')
</body>

</html>