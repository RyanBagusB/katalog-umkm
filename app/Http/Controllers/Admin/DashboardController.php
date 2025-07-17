<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataFeed;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $merchantsTotal = DB::table('users')
            ->where('role', 'merchant')    
            ->count();
        $productsTotal = DB::table('products')->count();
        $productNewer = DB::table('products')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        $merchNewer = DB::table('users')
            ->where('role', 'merchant')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return view('admin.dashboard.dashboard', compact('merchantsTotal', 'productsTotal', 'productNewer', 'merchNewer'));
    }

    public function analytics()
    {
        return view('pages.dashboard.analytics');
    }

    public function fintech()
    {
        return view('pages.dashboard.fintech');
    }
}
