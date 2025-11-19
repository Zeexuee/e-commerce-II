@extends('layouts.app')

@section('title', 'Login - Toko Beras Berkah')

@section('no_header', true)

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-bold text-black">Masuk ke Admin Panel</h2>
            <p class="mt-2 text-sm text-black">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-medium text-primary hover:text-primary/90">
                    Daftar di sini
                </a>
            </p>
        </div>

        <!-- Login Form -->
        <form action="{{ route('login.post') }}" method="POST" class="mt-8 space-y-6 bg-white p-8 rounded-lg shadow-md">
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

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-black">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('email') border-red-500 @enderror"
                    placeholder="admin@example.com"
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
                    placeholder="••••••••"
                >
            </div>

            <!-- Remember Me Checkbox -->
            <div class="flex items-center">
                <input
                    type="checkbox"
                    name="remember"
                    id="remember"
                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                >
                <label for="remember" class="ml-2 block text-sm text-black">
                    Ingat saya
                </label>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors"
            >
                Masuk
            </button>

            <!-- Back Link -->
            <div class="text-center">
                <a href="{{ route('home') }}" class="text-sm text-black hover:text-black/80">
                    ← Kembali ke Toko
                </a>
            </div>
        </form>

        <!-- Demo Info -->
        <div class="rounded-md bg-blue-50 p-4">
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800">Demo Account</h3>
                <p class="mt-2 text-sm text-blue-700">
                    Email: <span class="font-mono">admin@example.com</span><br>
                    Password: <span class="font-mono">password</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
