<!-- resources/views/admin/products/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <a href="{{ route('admin.products.show', ['product' => $product->id]) }}">Edit</a>
    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
    </form>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection