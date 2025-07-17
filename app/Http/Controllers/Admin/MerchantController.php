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
            'user_id'   => $user->id,
            'name'      => null,
            'slug'      => Str::slug($request->username),
            'phone'     => null,
            'address'   => null,
            'is_active' => true,
        ]);

        return redirect()
            ->route('admin.merchants.index')
            ->with('success', 'Merchant account created successfully.');
    }

    /**
     * Update the specified merchant in storage.
     */
    public function update(Request $request, Merchant $merchant)
    {
        $request->validate([
            'username'   => 'required|string|max:255|unique:users,username,' . $merchant->user_id,
            'password'   => 'nullable|string|min:6',
            'is_active'  => 'required|boolean',
            'name'       => 'nullable|string|max:255',
        ]);

        $user = $merchant->user;

        // Update user info
        $user->username = $request->username;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Update merchant info
        $merchant->name = $request->name;
        $merchant->slug = Str::slug($merchant->name ?: $user->username);
        $merchant->is_active = $request->boolean('is_active');
        $merchant->save();

        return redirect()
            ->route('admin.merchants.index')
            ->with('success', 'Merchant updated successfully.');
    }

    /**
     * Remove the specified merchant from storage.
     */
    public function destroy(Merchant $merchant)
    {
        // Delete the related user (cascade)
        $merchant->user->delete();

        return redirect()
            ->route('admin.merchants.index')
            ->with('success', 'Merchant deleted successfully.');
    }
}
