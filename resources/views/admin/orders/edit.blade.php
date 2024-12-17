@extends('layouts.admin')

@section('title', 'Edit Order')

@section('content')
<div class="container">
    <h1>Edit Order</h1>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_id">Product ID</label>
            <input type="text" name="product_id" id="product_id" class="form-control" value="{{ $order->product_id }}"
                required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $order->quantity }}"
                required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection