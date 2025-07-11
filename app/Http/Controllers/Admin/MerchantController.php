<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MerchantController extends Controller
{
    /**
     * Display a listing of the merchants.
     */
    public function index()
    {
        $merchants = Merchant::with('user')->latest()->paginate(10);
        return view('admin.merchants.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new merchant.
     */
    public function create()
    {
        return view('admin.merchants.create');
    }

    /**
     * Store a newly created merchant user and merchant record in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'merchant',
        ]);

        Merchant::create([
            'user_id' => $user->id,
            'name' => null,
            'slug' => Str::slug($request->username),
            'phone' => null,
            'address' => null,
            'is_active' => true,
        ]);

        return redirect()
            ->route('admin.merchants.index')
            ->with('success', 'Akun merchant berhasil dibuat. Silakan lengkapi detail merchant.');
    }

    /**
     * Display the specified merchant.
     */
    public function show(Merchant $merchant)
    {
        return view('admin.merchants.show', compact('merchant'));
    }

    /**
     * Show the form for editing the specified merchant.
     */
    public function edit(Merchant $merchant)
    {
        return view('admin.merchants.edit', compact('merchant'));
    }

    /**
     * Update the specified merchant in storage.
     */
    public function update(Request $request, Merchant $merchant)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $merchant->user_id,
            'password' => 'nullable|string|min:8',
        ]);

        $user = $merchant->user;

        $user->username = $request->username;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('admin.merchants.index')
            ->with('success', 'Akun merchant berhasil diperbarui.');
    }


    /**
     * Remove the specified merchant from storage.
     */
    public function destroy(Merchant $merchant)
    {
        $merchant->user->delete();

        return redirect()
            ->route('admin.merchants.index')
            ->with('success', 'Merchant berhasil dihapus.');
    }
}
