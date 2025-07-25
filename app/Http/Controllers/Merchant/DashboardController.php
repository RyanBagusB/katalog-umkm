<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Merchant;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $merchant = Merchant::with('products')
            ->where('user_id', $user->id)
            ->firstOrFail();

        return view('merchant.dashboard', compact('merchant'));
    }
}
