<!-- resources/views/admin/products/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="namep" id="name" class="form-control" value="{{ $product->namep }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $product->price }}"
                required>
        </div>


        <label for="category">Select Category:</label>
        <select name="category_id" id="category" class="form-control">
            <option value="{{ $product->category_id  }}">{{$product->category_id }}</option>
        </select>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection