<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $data_counts = [
        ];

        $auth_user = auth()->user();

        $data = [
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            'series' => [10, 20, 15, 25, 30],
        ];


        return view('admin.home.index', compact('data_counts', 'auth_user', 'data'));
    }
}
