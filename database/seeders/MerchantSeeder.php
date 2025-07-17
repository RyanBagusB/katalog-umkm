<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MerchantSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('username', 'merchant')->first();

        if (!$user) {
            $this->command->error('User "merchant" not found. Jalankan UserSeeder terlebih dahulu.');
            return;
        }

        $merchant = Merchant::create([
            'user_id' => $user->id,
            'name' => 'Toko Sari Rasa',
            'slug' => Str::slug('Toko Sari Rasa'),
        ]);

        for ($i = 1; $i <= 5; $i++) {
            Product::create([
                'merchant_id' => $merchant->id,
                'name' => 'Produk Contoh ' . $i,
                'slug' => Str::slug('Produk Contoh ' . $i) . '-' . uniqid(),
                'description' => 'Deskripsi produk contoh ' . $i,
                'price' => floor(rand(10000, 50000) / 1000) * 1000,
                'status' => 'visible',
            ]);
        }
    }
}
