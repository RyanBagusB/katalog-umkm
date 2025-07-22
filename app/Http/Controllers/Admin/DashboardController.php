<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMerchants = Merchant::count();
        $totalProducts = Product::count();
        $totalNews = News::count();
        $latestMerchants = Merchant::latest()->take(5)->get();
        $latestProducts  = Product::with('merchant')->latest()->take(5)->get();

        return view('admin.dashboard.dashboard', [
            'totalMerchants'   => $totalMerchants,
            'totalProducts'    => $totalProducts,
            'totalNews'        => $totalNews,
            'latestMerchants'  => $latestMerchants,
            'latestProducts'   => $latestProducts,
        ]);
    }
}
