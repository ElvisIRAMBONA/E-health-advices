<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
public function index()
{
    $productsCount = Product::count();
    $usersCount = User::count();
    $ordersCount = Order::count();
    $totalRevenue = Order::sum('total');
    $recentOrders = Order::with('user')->latest()->take(5)->get(); // Assurez-vous que l'association 'user' est bien définie dans le modèle Order

    return view('admin.dashboard', compact('productsCount', 'usersCount', 'ordersCount', 'totalRevenue', 'recentOrders'));
}



    public function reports()
    {
        return view('admin.reports');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}