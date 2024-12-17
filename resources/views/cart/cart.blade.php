{{-- resources/views/cart/cart.blade.php --}}
@extends('layouts.app')

@section('title', 'Mon Panier')

@section('content')
<div class="container">
    <h1 class="my-4">Mon Panier</h1>

    {{-- Vérifie si le panier est vide --}}
    @if(session('cart') && count(session('cart')) > 0)
    <th>Produit</th>
    <th>Image</th>
    <th>Prix</th>
    <th>Quantité</th>
    <th>Sous-total</th>
    <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach(session('cart') as $id => $product)
        @php $subtotal = $item['price'] * $product['quantity']; @endphp
        <tr>
            <td>{{ $product['namep'] }}</td>
            <td><img src="{{ Storage::url($product['image']) }}" alt="{{ $product['namep'] }}" width="50"></td>
            <td>{{ number_format($product['price'], 2) }} $</td>
            <td>
                <form action="{{ route('cart.update', $id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control"
                        style="width: 80px; display: inline;">
                    <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                </form>
            </td>
            <td>{{ number_format($subtotal, 2) }} $</td>
            <td>
                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @php $total += $subtotal; @endphp
        @endforeach
    </tbody>
    </table>

    <div class="text-right">
        <h4>Total : {{ number_format($total, 2) }} $</h4>
        <a href="#" class="btn btn-success">Passer la commande</a>
    </div>
    @else
    <p>Votre panier est vide.</p>
    @endif
</div>
@endsection <table class="table table-bordered">
    <thead>
        <tr>