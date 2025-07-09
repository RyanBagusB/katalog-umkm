<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductRevision;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductRevisionApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $revisions = ProductRevision::with('product.merchant.user')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.products.revision', compact('revisions'));
    }

    public function show(ProductRevision $revision)
    {
        return view('admin.product_revisions.show', compact('revision'));
    }

    public function approve(ProductRevision $revision)
    {
        $product = $revision->product;

        $product->update([
            'name' => $revision->name,
            'description' => $revision->description,
            'price' => $revision->price,
            'image' => $revision->image,
            'slug' => Str::slug($revision->name) . '-' . uniqid(),
        ]);

        $revision->update(['status' => 'approved']);

        Notification::create([
            'user_id' => $product->merchant->user_id,
            'title' => 'Revisi Produk Disetujui',
            'message' => 'Revisi produk "' . $product->name . '" telah disetujui.',
        ]);

        return redirect()
            ->route('admin.product-revisions.index')
            ->with('success', 'Revisi produk berhasil disetujui.');
    }

    public function reject(Request $request, ProductRevision $revision)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:1000',
        ]);

        $revision->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        Notification::create([
            'user_id' => $revision->product->merchant->user_id,
            'title' => 'Revisi Produk Ditolak',
            'message' => 'Revisi produk "' . $revision->product->name . '" ditolak. Alasan: ' . $request->rejection_reason,
        ]);

        return redirect()
            ->route('admin.product-revisions.index')
            ->with('success', 'Revisi produk berhasil ditolak.');
    }
}
