<!-- resources/views/admin/orders/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la commande</title>
</head>

<body>
    <h1>Détails de la commande #{{ $order->id }}</h1>

    <p><strong>Nom :</strong> {{ $order->name }}</p>
    <p><strong>Email :</strong> {{ $order->email }}</p>
    <p><strong>Téléphone :</strong> {{ $order->phone }}</p>
    <p><strong>Adresse :</strong> {{ $order->address }}</p>
    <p><strong>Ville :</strong> {{ $order->city }}</p>
    <p><strong>Code postal :</strong> {{ $order->zip }}</p>
    <p><strong>Méthode de paiement :</strong> {{ $order->payment_method }}</p>
    <p><strong>Status :</strong> {{ $order->status }}</p>
    <p><strong>Total :</strong> {{ number_format($order->total, 2) }} €</p>

    <a href="{{ route('admin.orders.index') }}">Retour aux commandes</a>
</body>

</html>