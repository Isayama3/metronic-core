<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        return view('admin.home.index', compact('dataCounts'));
    }
}
