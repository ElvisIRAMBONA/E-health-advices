<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Afficher toutes les commandes dans l'espace d'administration
    public function index()
    {
        // Récupérer toutes les commandes
        $orders = Order::orderBy('created_at', 'desc')->get();

        // Passer les commandes à la vue
        return view('admin.orders.index', compact('orders'));
    }

    // Afficher une commande spécifique (optionnel)
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    // Mettre à jour le statut d'une commande
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Le statut de la commande a été mis à jour.');
    }
}