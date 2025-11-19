@extends('layouts.app')

@section('title', 'Daftar - Toko Beras Berkah')

@section('no_header', true)

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-bold text-black">Buat Akun Baru</h2>
            <p class="mt-2 text-sm text-black">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-medium text-primary hover:text-primary/90">
                    Masuk di sini
                </a>
            </p>
        </div>

        <!-- Register Form -->
        <form action="{{ route('register.post') }}" method="POST" class="mt-8 space-y-6 bg-white p-8 rounded-lg shadow-md">
            @csrf

            @if ($errors->any())
                <div class="rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="ml-3">
                            @foreach ($errors->all() as $error)
                                <p class="text-sm font-medium text-red-800">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Name Input -->
            <div>
                <label for="name" class="block text-sm font-medium text-black">Nama Lengkap</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('name') border-red-500 @enderror"
                    placeholder="Nama Anda"
                >
            </div>

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-black">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('email') border-red-500 @enderror"
                    placeholder="email@example.com"
                >
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-black">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('password') border-red-500 @enderror"
                    placeholder="Minimal 6 karakter"
                >
                <p class="mt-1 text-xs text-gray-500">Password harus minimal 6 karakter</p>
            </div>

            <!-- Confirm Password Input -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-black">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('password_confirmation') border-red-500 @enderror"
                    placeholder="Ulangi password"
                >
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors"
            >
                Daftar
            </button>

            <!-- Back Link -->
            <div class="text-center">
                <a href="{{ route('home') }}" class="text-sm text-black hover:text-black/80">
                    ← Kembali ke Toko
                </a>
            </div>
        </form>

        <!-- Info Box -->
        <div class="rounded-md bg-cream p-4 border border-primary/20">
            <p class="text-sm text-gray-700">
                Dengan mendaftar, Anda dapat mengakses admin panel untuk mengelola produk dan pesanan.
            </p>
        </div>
    </div>
</div>
@endsection
