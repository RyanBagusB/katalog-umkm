<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        // langsung pakai scopeComplete()
        $merchants = Merchant::complete()->get();

        return view('landing.index', compact('merchants'));
    }

    public function show(Merchant $merchant)
    {
        if (! Merchant::complete()->where('id', $merchant->id)->exists()) {
            abort(404);
        }

        $products = $merchant->products()->get();

        return view('merchants.index', compact('merchant', 'products'));
    }

    public function allProducts(Merchant $merchant)
    {
        $merchant->load('products');

        return view('merchants.products', compact('merchant'));
    }

    public function contact(Merchant $merchant)
    {
        if (!Merchant::complete()->where('id', $merchant->id)->exists()) {
            abort(404);
        }

        return view('merchants.contact', compact('merchant'));
    }

    public function create() { /* … */ }
    public function store(Request $request) { /* … */ }
    public function edit(string $id) { /* … */ }
    public function update(Request $request, string $id) { /* … */ }
    public function destroy(string $id) { /* … */ }
}
