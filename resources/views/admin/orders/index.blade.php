@extends('admin.layouts.admin')

@section('title', 'Commandes - Admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Liste des Commandes</h1>

    <!-- Affichage des messages de succès -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tableau des commandes -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Code Postal</th>
                    <th>Méthode de Paiement</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->zip }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>
                        <!-- Status Badge -->
                        <span class="badge 
                            @if($order->status == 'Completed') badge-success
                            @elseif($order->status == 'Pending') badge-warning
                            @elseif($order->status == 'Cancelled') badge-danger
                            @else badge-secondary
                            @endif">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>{{ number_format($order->total, 2) }} €</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">Voir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection