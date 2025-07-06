<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Notification;
use Illuminate\Http\Request;

class ProductApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $products = Product::with(['merchant.user'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function approve(Product $product)
    {
        $product->update([
            'status' => 'approved',
            'rejection_reason' => null,
        ]);

        Notification::create([
            'user_id' => $product->merchant->user_id,
            'title' => 'Produk Disetujui',
            'message' => 'Produk "' . $product->name . '" telah disetujui dan sekarang tampil di katalog.',
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil disetujui.');
    }

    public function reject(Request $request, Product $product)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:1000',
        ]);

        $product->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        Notification::create([
            'user_id' => $product->merchant->user_id,
            'title' => 'Produk Ditolak',
            'message' => 'Produk "' . $product->name . '" ditolak. Alasan: ' . $request->rejection_reason,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditolak.');
    }
}
