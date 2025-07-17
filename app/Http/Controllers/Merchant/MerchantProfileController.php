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
        $merchant = Auth::user()->merchant;
        return view('merchant.profile.edit', compact('merchant'));
    }

    public function update(Request $request)
    {
        $merchant = Auth::user()->merchant;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',

            'banner_image' => 'nullable|image|max:5120',
            'tagline' => 'nullable|string|max:255',
            'banner_description' => 'nullable|string',

            'feature_1_title' => 'nullable|string|max:255',
            'feature_1_desc' => 'nullable|string',
            'feature_2_title' => 'nullable|string|max:255',
            'feature_2_desc' => 'nullable|string',
            'feature_3_title' => 'nullable|string|max:255',
            'feature_3_desc' => 'nullable|string',
            'feature_4_title' => 'nullable|string|max:255',
            'feature_4_desc' => 'nullable|string',

            'about_description' => 'nullable|string',
            'about_image' => 'nullable|image|max:5120',

            'contact_description' => 'nullable|string',
            'contact_image' => 'nullable|image|max:5120',
            'contact_address' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',
            'contact_instagram' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('banner_image')) {
            if ($merchant->banner_image) {
                Storage::disk('public')->delete($merchant->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('merchant_banners', 'public');
        }

        if ($request->hasFile('about_image')) {
            if ($merchant->about_image) {
                Storage::disk('public')->delete($merchant->about_image);
            }
            $validated['about_image'] = $request->file('about_image')->store('merchant_about', 'public');
        }

        if ($request->hasFile('contact_image')) {
            if ($merchant->contact_image) {
                Storage::disk('public')->delete($merchant->contact_image);
            }
            $validated['contact_image'] = $request->file('contact_image')->store('merchant_contact', 'public');
        }

        $merchant->update($validated);

        return redirect()
            ->route('merchant.profile.edit')
            ->with('success', 'Profil toko berhasil diperbarui.');
    }
}
