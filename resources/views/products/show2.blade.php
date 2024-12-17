{{-- resources/views/products/show.blade.php --}}
@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            {{-- Affiche l'image du produit --}}
            @if($product->image_url)
            <img src="{{ $product->image_url }}" class="img-fluid" alt="{{ $product->namep }}">

            @else
            <img src="https://via.placeholder.com/500" class="img-fluid" alt="No image available">
            @endif
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="col-md-6">
            <h1>{{ $product->namep }}</h1>
            {{-- Affiche le prix du produit --}}
            <h3 class="text-success">{{ number_format($product->price, 2) }} $</h3>

            {{-- Description du produit --}}
            <p>{{ $product->description }}</p>

            {{-- Formulaire pour ajouter au panier --}}
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="quantity">Quantité</label>
                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Ajouter au panier</button>
            </form>
        </div>
    </div>
</div>
@endsection