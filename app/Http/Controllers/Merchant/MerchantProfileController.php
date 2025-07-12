<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MerchantProfileController extends Controller
{
    public function edit()
    {
        $merchant = Auth::user()->merchant; // pastikan relasi user->merchant ada
        return view('merchant.profile.edit', compact('merchant'));
    }

    public function update(Request $request)
    {
        $merchant = Auth::user()->merchant;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($merchant->photo) {
                Storage::delete($merchant->photo);
            }

            $validated['photo'] = $request->file('photo')->store('merchant_photos', 'public');
        }

        $merchant->update($validated);

        return redirect()->route('merchant.profile.edit')->with('success', 'Profil toko berhasil diperbarui.');
    }
}
