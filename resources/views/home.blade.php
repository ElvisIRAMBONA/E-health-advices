<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>
    /* Styles communs */
    body {
        transition: background-color 0.3s, color 0.3s;
    }

    .light-mode {
        background-color: white;
        color: black;
    }

    .dark-mode {
        background-color: #121212;
        color: white;
    }

    .navbar {
        transition: background-color 0.3s;
    }

    .light-mode .navbar {
        background-color: #f8f9fa;
    }

    .dark-mode .navbar {
        background-color: #333;
    }

    .mode-toggle-btn {
        cursor: pointer;
        background-color: transparent;
        border: none;
        color: inherit;
        font-size: 18px;
    }

    /* Card Styling */
    .card {
        transition: background-color 0.3s, color 0.3s;
    }

    .light-mode .card {
        background-color: white;
        color: black;
    }

    .dark-mode .card {
        background-color: #333;
        color: white;
    }

    /* Your other styles */
    </style>
</head>

<body class="light-mode" id="body">
    @include('partials.navbar')



    @section('title', 'Home Page')

    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Slider START -->
                    <div class="tiny-slider arrow-round arrow-blur arrow-hover rounded-3 overflow-hidden">
                        <div class="tiny-slider-inner" data-autoplay="false" data-gutter="0" data-arrow="true"
                            data-dots="false" data-items="1">
                            <!-- Card item START -->
                            <div class="card overflow-hidden h-500px h-md-600px text-center rounded-0"
                                style="background-image:url(assets/images/bg/hypertension2.jpeg); background-position: center left; background-size: cover;">
                                <!-- Background dark overlay -->
                                <div class="bg-overlay bg-dark opacity-6"></div>
                                <!-- Card image overlay -->
                                <div class="card-img-overlay d-flex align-items-center p-2 p-sm-4">
                                    <div class="w-100 my-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-11 col-lg-7">
                                                <!-- Title -->
                                                <h1 class="text-white display-6">E-Health: Your health, our priority.
                                                </h1>
                                                <p class="text-white">Welcome to E-Health, where your well-being is our
                                                    priority. Discover tailored products, expert advice, and easy access
                                                    to specialists—all designed to help you live healthier and happier.
                                                </p>
                                                <!-- Button -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card item END -->
                        </div>
                    </div>
                    <!-- Slider END -->
                </div>
            </div>
        </div>
    </section>





    <section class="pt-0">

        <div class="container">
            <!-- Title -->
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h2>Explore Our Categories</h2>
                    <p class="mb-0">Find specialized products and expert advice to support your health and wellness
                        journey.</p>

                </div>
            </div>
            <div class="row g-4">

                @foreach($products as $product)

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card shadow h-100">
                        <!-- Image -->
                        <img src="{{ $product->image_url }}" alt="{{ $product->namep }}" class="card-img-top">

                        <!-- Card body -->
                        <div class="card-body  bg-primary pb-0 ">
                            <!-- Badge and favorite -->
                            <div class="d-flex justify-content-between mb-2">
                                <a href="#" class="badge bg-primary bg-opacity-10 text-primary">{{ $product['id'] }}</a>
                                <a href="#" class="text-dark"><i class="far fa-heart"></i></a>
                            </div>
                            <!-- Title -->
                            <h5 class="card-title fw-normal"><a href="#">{{ $product['namep'] }}</a></h5>
                            <p class="mb-2 text-truncate-2">{{ $product['description'] }} </p>
                            <!-- Rating star -->


                        </div>
                        <!-- Card footer -->
                        <div class="card-footer pt-0 pb-3">
                            <hr>
                            <div class="d-flex justify-content-between">
                                <span class="text-dark"><i
                                        class="fas fa-dollar-sign text-blue me-2"></i>{{ $product['price'] }}</span>
                                <span class="text-dark"><i class="fas fa-shopping-cart text-orange me-2"></i> <a
                                        href="{{ url('/products/' . $product->id) }}">Buy Now</a></span>
                            </div>
                        </div>
                    </div>
                </div>



                @endforeach

            </div>
        </div>








        <script src="{{ asset('js/app.js') }}"></script>

        @include('partials.footer')

        <!-- JavaScript to toggle between dark and light modes -->
        <script>
        // JavaScript to toggle light/dark mode
        const modeToggle = document.createElement('button');
        modeToggle.classList.add('mode-toggle-btn');
        modeToggle.innerHTML = '<i class="fas fa-moon"></i>'; // Default icon for dark mode
        document.body.appendChild(modeToggle);

        const body = document.getElementById('body');

        modeToggle.addEventListener('click', () => {
            if (body.classList.contains('light-mode')) {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                modeToggle.innerHTML = '<i class="fas fa-sun"></i>'; // Sun icon for light mode
            } else {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                modeToggle.innerHTML = '<i class="fas fa-moon"></i>'; // Moon icon for dark mode
            }
        });
        </script>
</body>

</html>