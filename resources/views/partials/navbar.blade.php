<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Bootstrap CSS -->

    <!-- Dark mode -->
    <script>
    const storedTheme = localStorage.getItem('theme')

    const getPreferredTheme = () => {
        if (storedTheme) {
            return storedTheme
        }
        return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
    }

    const setTheme = function(theme) {
        if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.setAttribute('data-bs-theme', 'dark')
        } else {
            document.documentElement.setAttribute('data-bs-theme', theme)
        }
    }

    setTheme(getPreferredTheme())

    window.addEventListener('DOMContentLoaded', () => {
        var el = document.querySelector('.theme-icon-active');
        if (el != 'undefined' && el != null) {
            const showActiveTheme = theme => {
                const activeThemeIcon = document.querySelector('.theme-icon-active use')
                const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                    element.classList.remove('active')
                })

                btnToActive.classList.add('active')
                activeThemeIcon.setAttribute('href', svgOfActiveBtn)
            }

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                if (storedTheme !== 'light' || storedTheme !== 'dark') {
                    setTheme(getPreferredTheme())
                }
            })

            showActiveTheme(getPreferredTheme())

            document.querySelectorAll('[data-bs-theme-value]')
                .forEach(toggle => {
                    toggle.addEventListener('click', () => {
                        const theme = toggle.getAttribute('data-bs-theme-value')
                        localStorage.setItem('theme', theme)
                        setTheme(theme)
                        showActiveTheme(theme)
                    })
                })

        }
    })
    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/tiny-slider/tiny-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/glightbox/css/glightbox.css') }}">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* CSS to display dropdown on hover */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
        /* Remove margin to align dropdown */
    }
    </style>

</head>

<body>


    <!-- Header START -->
    <header class="navbar-light navbar-sticky">
        <!-- Nav START -->
        <nav class="navbar navbar-expand-xl z-index-9">
            <div class="container">
                <!-- Logo START -->
                <a class="navbar-brand" href="index-2.html">
                    <img class="light-mode-item navbar-brand-item" src="{{ asset('assets/images/logo2.webp') }}"
                        alt="logo">
                    <img class="dark-mode-item navbar-brand-item" src="{{ asset('assets/images/logo.webp') }}"
                        alt="logo">
                </a>

                <!-- Logo END -->

                <!-- Responsive navbar toggler -->
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-animation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- Main navbar START -->
                <div class="navbar-collapse collapse" id="navbarCollapse">

                    <!-- Nav Main menu START -->
                    <ul class="navbar-nav navbar-nav-scroll">
                        <!-- Nav item 1 Home -->
                        <li class="nav-item dropdown"> <a class="nav-link" href="{{ route('home') }}"><i
                                    class=" bi bi-house me-2"></i>Home</a> </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Category</a>
                            <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                                <a class="dropdown-item" href="{{ url('/category/hypertension') }}">Hypertension</a>
                                <a class="dropdown-item" href="{{ url('/category/diabetes') }}">Diabetes</a>
                                <a class="dropdown-item" href="{{ url('/category/cancer') }}">Cancer</a>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/doctor') }}">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('my') }}">Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                        </li>

                    </ul>
                    <!-- Nav Main menu END -->
                </div>
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <!-- Main navbar END -->

                    <!-- Profile and notification START -->
                    <ul class="nav flex-row align-items-center list-unstyled ms-xl-auto">

                        <!-- Add to cart START -->
                        <li class="nav-item ms-2 dropdown ">
                            <!-- Cart button -->
                            <a class="btn btn-light btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="outside">
                                <i class="bi bi-cart3 fa-fw"></i>
                            </a>
                            <!-- badge -->


                            <!-- Cart dropdown menu START -->
                            <div
                                class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
                                <div class="card bg-transparent">
                                    <div class="card-header bg-transparent border-bottom py-4">
                                        <h5 class="m-0">Cart items</h5>
                                    </div>
                                    <div class="card-body p-0">

                                        <!-- Cart item START -->
                                        <div class="row p-3 g-2">
                                            <!-- Image -->
                                            <div class="col-3">
                                                <img class="rounded-2" src="assets/images/book/02.jpg" alt="avatar">
                                            </div>

                                            <div class="col-9">
                                                <!-- Title -->
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="m-0">Angular 4 Tutorial in audio (Compact Disk)</h6>
                                                    <a href="#" class="small text-primary-hover"><i
                                                            class="bi bi-x-lg"></i></a>
                                                </div>
                                                <!-- Select item -->
                                                <form class="choices-sm pt-2 col-4">
                                                    <select class="form-select js-choice border-0 bg-transparent"
                                                        data-search-enabled="false">
                                                        <option>1</option>
                                                        <option selected>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Cart item END -->

                                        <!-- Divider -->
                                        <hr class="m-0">

                                        <!-- Cart item START -->
                                        <div class="row p-3 g-2">
                                            <!-- Image -->
                                            <div class="col-3">
                                                <img class="rounded-2" src="assets/images/book/04.jpg" alt="avatar">
                                            </div>

                                            <div class="col-9">
                                                <!-- Title -->
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="m-0">The Principles of Beautiful Graphics Design
                                                        (Paperback)
                                                    </h6>
                                                    <a href="#" class="small text-primary-hover"><i
                                                            class="bi bi-x-lg"></i></a>
                                                </div>
                                                <!-- Select item -->
                                                <form class="choices-sm pt-2 col-4">
                                                    <select class="form-select js-choice border-0 bg-transparent"
                                                        data-search-enabled="false">
                                                        <option selected>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Cart item END -->

                                    </div>
                                    <!-- Button -->
                                    <div
                                        class="card-footer bg-transparent border-top py-3 text-center d-flex justify-content-between position-relative">
                                        <a href="#" class="btn btn-sm btn-light mb-0">View Cart</a>
                                        <a href="#" class="btn btn-sm btn-success mb-0">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Cart dropdown menu END -->
                        </li>
                        <!-- Add to cart END -->
                        <!-- Profile dropdown START -->
                        <li class="nav-item ms-3 dropdown">
                            <!-- Avatar -->
                            <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button"
                                data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
                            </a> <!-- Profile dropdown START -->
                            <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
                                aria-labelledby="profileDropdown">
                                <!-- Profile info -->
                                <li class="px-3 mb-3">
                                    <div class="d-flex align-items-center">
                                        <!-- Avatar -->
                                        <div class="avatar me-3">
                                            <img class="avatar-img rounded-circle shadow"
                                                src="assets/images/avatar/01.jpg" alt="avatar">
                                        </div>
                                        <div>
                                            <a class="h6" href="#">{{ Auth::user()->name }}</a>
                                            <p class="small m-0">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </li>
                                <!-- Links -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                            class="bi bi-person fa-fw me-2"></i>Edit
                                        Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account
                                        Settings</a></li>
                                <li><a class="dropdown-item" href="#"><i
                                            class="bi bi-info-circle fa-fw me-2"></i>Help</a>
                                </li>
                                <li><a class="dropdown-item bg-danger-soft-hover" href="{{ route('logout') }}"><i
                                            class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <!-- Dark mode options START -->
                                <li>
                                    <div
                                        class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
                                        <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-sun fa-fw mode-switch"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                                <use href="#"></use>
                                            </svg> Light
                                        </button>
                                        <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                                                <path
                                                    d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                                                <use href="#"></use>
                                            </svg> Dark
                                        </button>
                                        <button type="button" class="btn btn-sm mb-0 active" data-bs-theme-value="auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-circle-half fa-fw mode-switch"
                                                viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
                                                <use href="#"></use>
                                            </svg> Auto
                                        </button>
                                    </div>
                                </li>
                                <!-- Dark mode options END-->
                            </ul>
                            <!-- Profile dropdown END -->
                        </li>
                    </ul>
                    @endguest
                    <!-- Profile and notification END -->
            </div>
        </nav>
        <!-- Nav END -->

    </header>
    <!-- Header END -->



    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Vendors -->
    <script src="{{ asset('assets/vendor/tiny-slider/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounterjs/dist/purecounter_vanilla.js') }}"></script>
    <!-- Template Functions -->
    <script src="{{ asset('assets/js/functions.js') }}"></script>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</body>

</html>