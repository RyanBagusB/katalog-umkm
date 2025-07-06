<x-app-layout>
<div class="container">
    <h1 class="mb-4">Merchant Details</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h3>{{ $merchant->name }}</h3>
            <p><strong>Username:</strong> {{ $merchant->user->username }}</p>
            <p><strong>Slug:</strong> {{ $merchant->slug }}</p>
            <p><strong>Phone:</strong> {{ $merchant->phone ?? '-' }}</p>
            <p><strong>Address:</strong> {{ $merchant->address ?? '-' }}</p>
            <p><strong>Status:</strong>
                @if($merchant->is_active)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </p>
            <p><strong>Created At:</strong> {{ $merchant->created_at->format('Y-m-d') }}</p>
        </div>
    </div>

    <a href="{{ route('admin.merchants.edit', $merchant) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('admin.merchants.index') }}" class="btn btn-secondary">Back</a>
</div>
</x-app-layout>
