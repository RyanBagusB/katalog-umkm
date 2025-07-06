<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Edit Produk</h1>
        <form action="{{ route('merchant.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-medium">Nama Produk</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-input w-full">
                @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium">Deskripsi</label>
                <textarea name="description" class="form-textarea w-full">{{ old('description', $product->description) }}</textarea>
                @error('description')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium">Harga</label>
                <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}" class="form-input w-full">
                @error('price')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block font-medium">Gambar Produk (opsional)</label>
                <input type="file" name="image" class="form-input w-full">
                @error('image')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </div>
            <div class="flex gap-2">
                <a href="{{ route('merchant.products.index') }}" class="btn border text-gray-700">Batal</a>
                <button type="submit" class="btn bg-gray-900 text-white">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
