<?php

namespace App\Http\Controllers\Admin\Statistics;

use App\Http\Controllers\Controller;
use App\Models\Ride;

class StatisticsController extends Controller
{
    public function index()
    {
        $dataCounts = [
        ];

        $data = [
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            'series' => [10, 20, 15, 25, 30],
        ];

        $last_rides = Ride::limit(10)->get();

        return view('admin.statistics.index', compact('data', 'last_rides'));
    }
}
