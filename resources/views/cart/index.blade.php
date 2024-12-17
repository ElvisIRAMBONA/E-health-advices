{{-- resources/views/cart/cart.blade.php --}}
@extends('layouts.app')
@include('partials.navbar')
@section('title', 'Mon Panier')

@section('content')
<div class="container">
    <h1 class="my-4">Mon Panier</h1>

    {{-- Vérifie si le panier est vide --}}
    @if(session('cart') && count(session('cart')) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Quantité</th>
                <th>Prix Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $product)
            @php $subtotal = $product['price'] * $product['quantity']; @endphp
            <tr>
                <td>{{ $product['namep'] }}</td>
                <td><img src="{{ $product['image_url'] }}" alt="{{ $product['namep'] }}" width="50"></td>
                <td>{{ number_format($product['price'], 2) }} $</td>
                <td>{{ $product['description'] }}</td>
                <td>{{ $product['quantity'] }}</td>
                <td>{{ number_format($subtotal, 2) }} $</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                    <form action="{{ route('cart.update', $id) }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1">
                        <button type="submit">Mettre à jour</button>
                    </form>
                </td>
            </tr>
            @php $total += $subtotal; @endphp
            @endforeach
        </tbody>
    </table>

    <div class="text-right">
        <h4>Total : {{ number_format($total, 2) }} $</h4>
        <a href="{{ route('checkout') }}" class="btn btn-success">Passer la commande</a>
    </div>
    @else
    <p>Votre panier est vide.</p>
    @endif
</div>
@endsection