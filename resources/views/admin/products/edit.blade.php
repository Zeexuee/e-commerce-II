@extends('layouts.admin')

@section('title', 'Edit Produk - Admin')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-2">Edit Produk</h1>
    <p class="text-gray-600">Update informasi produk</p>
</div>

<div class="bg-white rounded-lg shadow-md p-8 max-w-2xl">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Produk -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-800 mb-2">Nama Produk</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('name') border-red-500 @enderror"
                placeholder="Masukkan nama produk">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="description" class="block text-sm font-semibold text-gray-800 mb-2">Deskripsi</label>
            <textarea name="description" id="description" rows="4" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('description') border-red-500 @enderror"
                placeholder="Masukkan deskripsi produk">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Harga & Stok -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="price" class="block text-sm font-semibold text-gray-800 mb-2">Harga (Rp)</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" required step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('price') border-red-500 @enderror"
                    placeholder="0">
                @error('price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stock" class="block text-sm font-semibold text-gray-800 mb-2">Stok</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('stock') border-red-500 @enderror"
                    placeholder="0">
                @error('stock')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- SKU & Kategori -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="sku" class="block text-sm font-semibold text-gray-800 mb-2">SKU</label>
                <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('sku') border-red-500 @enderror"
                    placeholder="Contoh: BR-001">
                @error('sku')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-semibold text-gray-800 mb-2">Kategori</label>
                <select name="category" id="category" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('category') border-red-500 @enderror">
                    <option value="">Pilih Kategori</option>
                    <option value="Beras Putih" @selected(old('category', $product->category) === 'Beras Putih')>Beras Putih</option>
                    <option value="Beras Merah" @selected(old('category', $product->category) === 'Beras Merah')>Beras Merah</option>
                    <option value="Premium" @selected(old('category', $product->category) === 'Premium')>Premium</option>
                    <option value="Regular" @selected(old('category', $product->category) === 'Regular')>Regular</option>
                </select>
                @error('category')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Status Aktif -->
        <div class="flex items-center gap-3">
            <input type="checkbox" name="is_active" id="is_active" value="1" @checked(old('is_active', $product->is_active))
                class="w-5 h-5 text-primary rounded">
            <label for="is_active" class="text-sm font-semibold text-gray-800">Produk Aktif</label>
        </div>

        <!-- Image Upload -->
        <div>
            <label for="image1" class="block text-sm font-semibold text-gray-800 mb-2">Gambar Produk 1</label>
            @if ($product->image1)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $product->image1) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg">
                </div>
            @endif
            <input type="file" name="image1" id="image1"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('image1') border-red-500 @enderror">
            <p class="text-xs text-gray-500 mt-1">Format: JPEG, PNG, JPG, GIF, SVG. Max: 5MB</p>
            @error('image1')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image2" class="block text-sm font-semibold text-gray-800 mb-2">Gambar Produk 2 (Opsional)</label>
            @if ($product->image2)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $product->image2) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg">
                </div>
            @endif
            <input type="file" name="image2" id="image2"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('image2') border-red-500 @enderror">
            <p class="text-xs text-gray-500 mt-1">Format: JPEG, PNG, JPG, GIF, SVG. Max: 5MB</p>
            @error('image2')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image3" class="block text-sm font-semibold text-gray-800 mb-2">Gambar Produk 3 (Opsional)</label>
            @if ($product->image3)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $product->image3) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg">
                </div>
            @endif
            <input type="file" name="image3" id="image3"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('image3') border-red-500 @enderror">
            <p class="text-xs text-gray-500 mt-1">Format: JPEG, PNG, JPG, GIF, SVG. Max: 5MB</p>
            @error('image3')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex gap-4 pt-4">
            <button type="submit" class="bg-primary text-black px-6 py-2 rounded-lg hover:bg-primary/90 transition-colors font-semibold">
                Update Produk
            </button>
            <a href="{{ route('admin.products.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400 transition-colors font-semibold">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
