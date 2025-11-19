<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Keranjang kosong');
        }

        return view('orders.checkout');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Keranjang kosong');
        }

        $totalAmount = 0;
        $cartItems = [];

        // Hitung total dan validasi stok
        foreach ($cart as $productId => $quantity) {
            $product = Product::findOrFail($productId);
            
            if ($product->stock < $quantity) {
                return redirect()->route('cart.show')->with('error', 'Stok tidak cukup untuk: ' . $product->name);
            }

            $cartItems[$productId] = [
                'product' => $product,
                'quantity' => $quantity,
                'unit_price' => $product->price,
                'total_price' => $product->price * $quantity,
            ];

            $totalAmount += $cartItems[$productId]['total_price'];
        }

        // Buat order
        $order = new Order();
        $order->user_id = auth()->id() ?? 0;
        $order->total_amount = $totalAmount;
        $order->status = 'pending';
        $order->customer_name = $validated['customer_name'];
        $order->customer_email = $validated['customer_email'];
        $order->customer_phone = $validated['customer_phone'];
        $order->shipping_address = $validated['shipping_address'];
        $order->notes = $validated['notes'];
        $order->save();

        // Generate order number
        $order->generateOrderNumber();
        $order->save();

        // Simpan order items dan kurangi stok
        foreach ($cartItems as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total_price' => $item['total_price'],
            ]);

            // Kurangi stok produk
            $item['product']->decrement('stock', $item['quantity']);
        }

        // Kosongkan cart
        session()->forget('cart');

        return redirect()->route('order.success', $order->id)->with('success', 'Pesanan berhasil dibuat');
    }

    public function success(Order $order)
    {
        return view('orders.success', compact('order'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
