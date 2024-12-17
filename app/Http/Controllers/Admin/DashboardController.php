<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $usersCount = User::count();
        $ordersCount = Order::count();
        $totalRevenue = Order::sum('total'); // Assurez-vous que votre colonne `total` existe dans votre table des commandes
        $recentOrders = Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('productsCount', 'usersCount', 'ordersCount', 'totalRevenue', 'recentOrders'));
    }
}