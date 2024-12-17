@extends('admin.layouts.admin')

@section('title', 'Create Order')

@section('content')
<div class="container">
    <h1>Create Order</h1>

    <form action="{{ route('admin.orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Product ID</label>
            <input type="text" name="product_id" id="product_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection