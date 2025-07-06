<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // TAMBAHKAN BARIS INI
use Illuminate\Http\Request;
use App\Models\DataFeed;

class DashboardController extends Controller
{
    public function index()
    {
        $dataFeed = new DataFeed();

        return view('pages.dashboard.dashboard', compact('dataFeed'));
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
