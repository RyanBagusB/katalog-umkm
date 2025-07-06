<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $merchant = auth()->user()->merchant;

        return view('merchant.dashboard', compact('merchant'));
    }
}
