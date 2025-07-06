<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $merchant = Auth::user()->merchant;

        $products = Product::where('merchant_id', $merchant->id)
            ->latest()
            ->paginate(10);

        return view('merchant.products.index', compact('products', 'merchant'));
    }

    public function create()
    {
        return view('merchant.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'merchant_id' => Auth::user()->merchant->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . uniqid(),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('merchant.products.index')
            ->with('success', 'Produk berhasil diajukan dan menunggu persetujuan admin.');
    }

    public function edit(Product $product)
    {
        $this->authorizeProduct($product);

        return view('merchant.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorizeProduct($product);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Update slug setiap kali nama diubah
        $data['slug'] = Str::slug($request->name) . '-' . uniqid();

        $data['status'] = 'pending';

        $product->update($data);

        return redirect()
            ->route('merchant.products.index')
            ->with('success', 'Produk berhasil diperbarui dan menunggu persetujuan admin.');
    }

    public function destroy(Product $product)
    {
        $this->authorizeProduct($product);

        $product->delete();

        return redirect()
            ->route('merchant.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    private function authorizeProduct(Product $product)
    {
        if ($product->merchant_id !== Auth::user()->merchant->id) {
            abort(403, 'Unauthorized action.');
        }
    }
}
