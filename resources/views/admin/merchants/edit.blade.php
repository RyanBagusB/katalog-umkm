<x-app-layout>
<div class="container">
    <h1 class="mb-4">Edit Merchant</h1>

    <form action="{{ route('admin.merchants.update', $merchant) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Merchant Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $merchant->name) }}" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $merchant->slug) }}">
            @error('slug') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $merchant->phone) }}">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ old('address', $merchant->address) }}</textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_active" class="form-check-input" {{ $merchant->is_active ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <button class="btn btn-primary">Update Merchant</button>
        <a href="{{ route('admin.merchants.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</x-app-layout>
