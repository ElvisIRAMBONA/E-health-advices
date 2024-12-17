<!-- resources/views/admin/products/create.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Create Product</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="namep" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <label for="category">Select Category:</label>
        <select name="category_id" id="category" class="form-control">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection