<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\News;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $merchants = Merchant::complete()->get();

        $news = News::orderByDesc('published_at')
            ->take(4)
            ->get();

        return view('landing.index', compact('merchants', 'news'));
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

    public function listMerchants()
    {
        $merchants = Merchant::complete()->get();
        return view('landing.merchants', compact('merchants'));
    }

    public function listNews()
    {
        $news = News::orderByDesc('published_at')->get();
        return view('landing.articles', compact('news'));
    }

    public function showNews($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $relatedNews = News::where('id', '!=', $news->id)
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

    return view('landing.detail-article', compact('news', 'relatedNews'));
    }
}
