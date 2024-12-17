@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1 class="mt-4">Tableau de Bord</h1>

    <!-- Metrics Section -->
    <div class="row mt-4">
        <!-- Products Card -->
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">Produits</h5>
                    <p class="text-center display-4">{{ $productsCount }}</p>
                </div>
            </div>
        </div>

        <!-- Users Card -->
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">Utilisateurs</h5>
                    <p class="text-center display-4">{{ $usersCount }}</p>
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">Commandes</h5>
                    <p class="text-center display-4">{{ $ordersCount }}</p>
                </div>
            </div>
        </div>

        <!-- Total Revenue Card -->
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-center">Revenu Total</h5>
                    <p class="text-center display-4">{{ $totalRevenue }} €</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders Section -->
    <h2 class="mt-5">Commandes Récentes</h2>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Total</th>
                    <th>Statut</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->total }} €</td>
                    <td>
                        <!-- Dynamic Badges for Order Status -->
                        <span class="badge 
                            @if($order->status == 'Completed') badge-success 
                            @elseif($order->status == 'Pending') badge-warning
                            @elseif($order->status == 'Cancelled') badge-danger
                            @else badge-secondary
                            @endif">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection