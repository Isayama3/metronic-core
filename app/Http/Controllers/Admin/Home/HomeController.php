<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Ride;

class HomeController extends Controller
{
    public function index()
    {
        $dataCounts = [
            // 'clients' => DB::table('clients')->count(),
            // 'orders' => DB::table('orders')->count(),
            // 'products' => DB::table('products')->count(),
            // 'services' => DB::table('services')->count(),
            // 'bookings' => DB::table('bookings')->count(),
        ];

        $auth_user = auth()->user();
        $auth_user->load('wallet', 'wallet.transactions');
        $transactions = $auth_user->wallet?->transactions()?->paginate(15);

        $data = [
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            'series' => [10, 20, 15, 25, 30],
        ];

        $last_rides = Ride::limit(10)->get();

        return view('admin.home.index', compact('dataCounts', 'auth_user', 'transactions', 'data', 'last_rides'));
    }
}
