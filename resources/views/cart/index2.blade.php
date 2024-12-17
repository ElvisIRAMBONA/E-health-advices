@extends('layouts.app')

@section('title', 'Mon Panier')

@section('content')
<div class="container">
    <h1>Mon Panier</h1>

    @if(session('cart') && count(session('cart')) > 0)
    <ul>
        @foreach(session('cart') as $id => $product)
        <li>
            <img src="{{ $product['image_url'] }}" alt="{{ $product['namep'] }}" width="100">
            <p>{{ $product['namep'] }}</p>
            <p>Prix : {{ number_format($product['price'], 2) }} $</p>
            <p>{{ $product['description'] }}</p>
            <p>Quantité : {{ $product['quantity'] }}</p>
            <p>Total : {{ number_format($product['price'] * $product['quantity'], 2) }} $</p>
        </li>
        @endforeach
    </ul>
    <a href="{{ route('checkout') }}" class="btn btn-success">Pass the command</a>
    @else
    <p>Votre panier est vide.</p>
    @endif