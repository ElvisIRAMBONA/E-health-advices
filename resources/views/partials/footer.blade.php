<footer class="bg-light text-dark py-5">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="mb-3">About Us</h5>
                <p>
                    We provide high-quality medical products that you can trust. Our mission is to ensure customer
                    satisfaction and offer the best healthcare solutions.
                </p>
                <p>
                    <strong>Customer Service:</strong> +25768041578
                </p>
                <p>Email: presira857@gmail.com</p>
            </div>

            <!-- Useful Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="mb-3">Userful Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Product Categories -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="mb-3">Product Categories</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/category/hypertension') }}">Hypertension</a></li>
                    <li><a href="{{ url('/category/diabetes') }}">Diabetes</a></li>
                    <li><a href="{{ url('/category/cancer') }}">Cancer</a></li>
                    <li><a href="{{ url('/category/devices') }}">Medical Devices</a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="mb-3">Newsletter</h5>
                <form action="{{ route('newsletter.subscribe') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </div>
                </form>
                <p class="mt-3">Subscribe to our newsletter for the latest updates on medical products and offers.</p>
            </div>
        </div>

        <div class="text-center mt-4">
            <p>&copy; {{ date('Y') }} Elvis Brown. All Rights Reserved.</p>
            <div>
                <a href="https://www.facebook.com/" class="text-dark me-2">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="https://www.twitter.com/" class="text-dark me-2"><i class="fab fa-twitter"></i>
                    <ion-icon name="logo-twitter"></ion-icon>
                    <a href="https://www.instagram.com" class="text-dark"><i class="fab fa-instagram"></i>
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
            </div>
        </div>
    </div>
</footer>