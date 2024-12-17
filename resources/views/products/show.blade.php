{{-- resources/views/products/show.blade.php --}}
@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">
    <div class="row">
        <!-- Product Image Section -->
        <div class="col-md-6">
            {{-- Display product image --}}
            @if($product->image_url)
            <img src="{{ $product->image_url }}" class="img-fluid" alt="{{ $product->namep }}">
            @else
            <img src="https://via.placeholder.com/500" class="img-fluid" alt="No image available">
            @endif
        </div>

        <!-- Product Details Section -->
        <div class="col-md-6">
            {{-- Success Message --}}
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <h1>{{ $product->namep }}</h1>

            {{-- Display Product Price --}}
            <h3 class="text-success">
                <span id="price" data-base-price="{{ $product->price }}">
                    {{ number_format($product->price, 2) }}
                </span> $
            </h3>

            {{-- Product Description --}}
            <p>{{ $product->description }}</p>

            {{-- Add to Cart Form --}}
            <form action="{{ route('cart.add', $product->id) }}" method="POST" id="add-to-cart-form">
                @csrf
                <div class="form-group">
                    <label for="quantity">Quantité</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                        class="form-control" style="width: 100px;">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Ajouter au panier</button>
            </form>
        </div>
    </div>
</div>

{{-- Include jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- AJAX Script to Update Price Dynamically --}}
<script>
$(document).ready(function() {
    // Retrieve the base price from the data attribute and parse it as a float
    const basePrice = parseFloat($('#price').data('base-price'));

    // Function to update the displayed price based on quantity
    function updatePrice(quantity) {
        // Calculate the new price
        const newPrice = (quantity * basePrice).toFixed(2);
        // Update the price in the DOM
        $('#price').text(newPrice);
    }

    // Event listener for changes in the quantity input
    $('#quantity').on('input', function() {
        // Get the current quantity value
        let quantity = parseInt($(this).val());

        // Validate the quantity
        if (!isNaN(quantity) && quantity > 0) {
            updatePrice(quantity);
        } else {
            // If invalid, reset to base price
            updatePrice(1);
        }
    });

    // Optional: Update price on form submission to ensure accuracy
    $('#add-to-cart-form').on('submit', function(e) {
        // Prevent form submission if needed or perform additional checks
        // For example, you can send an AJAX request to add to cart without reloading
        // Uncomment the lines below to prevent form submission and handle via AJAX

        /*
        e.preventDefault();
        const quantity = parseInt($('#quantity').val());

        $.ajax({
            url: "{{ route('cart.add', $product->id) }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                quantity: quantity
            },
            success: function(response) {
                // Handle success (e.g., update cart count, show a success message)
                alert('Produit ajouté au panier avec succès!');
                // Optionally, update other parts of the page dynamically
            },
            error: function(xhr) {
                // Handle error
                alert('Erreur lors de l\'ajout du produit au panier.');
            }
        });
        */
    });
});
</script>
@endsection