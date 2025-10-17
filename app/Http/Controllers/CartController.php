<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Tampilkan halaman cart
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to view your cart.');
        }

        $cartItems = Cart::with('destination')
            ->where('user_id', Auth::id())
            ->where('status', 'active')
            ->get();

        $totalPrice = $cartItems->sum('total_price');

        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    /**
     * Tambah item ke cart
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'quantity' => 'required|integer|min:1|max:10'
        ]);

        $destination = Destination::findOrFail($validated['destination_id']);

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('destination_id', $validated['destination_id'])
            ->where('status', 'active')
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $validated['quantity'];
            $cartItem->total_price = $cartItem->price * $cartItem->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'destination_id' => $validated['destination_id'],
                'quantity' => $validated['quantity'],
                'price' => $destination->price,
                'total_price' => $destination->price * $validated['quantity'],
                'status' => 'active'
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Item added to cart!');
    }

    /**
     * Update quantity item di cart (AJAX)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10'
        ]);

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('id', $id)
            ->where('status', 'active')
            ->firstOrFail();

        $cartItem->quantity = $request->quantity;
        $cartItem->total_price = $cartItem->price * $request->quantity;
        $cartItem->save();

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully',
            'total_price' => number_format($cartItem->total_price, 0, ',', '.'),
            'cart_total' => number_format(Cart::where('user_id', Auth::id())->where('status', 'active')->sum('total_price'), 0, ',', '.')
        ]);
    }

    /**
     * Hapus item dari cart
     */
    public function destroy($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully.');
    }

    /**
     * Hapus semua item di cart
     */
    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully.');
    }

    /**
     * Tampilkan halaman checkout
     */
    public function checkout()
    {
        $user = Auth::user();

        $cartItems = Cart::with('destination')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty. Please add items before checkout.');
        }

        $subtotal = $cartItems->sum('total_price');
        $adminFee = max(5000, $subtotal * 0.02);
        $total = $subtotal + $adminFee;

        // kamu bisa pilih:
        // 1. langsung redirect ke payment
        // 2. tampilkan halaman checkout detail
        // di bawah ini aku aktifkan opsi 2 (tampilkan halaman dulu)
        return view('checkout', compact('cartItems', 'subtotal', 'adminFee', 'total'));
    }

    /**
     * Konfirmasi checkout & redirect ke payment
     */
    public function confirmCheckout()
    {
        $user = Auth::user();

        $cartItems = Cart::where('user_id', $user->id)
            ->where('status', 'active')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum('total_price');
        $adminFee = max(5000, $subtotal * 0.02);
        $total = $subtotal + $adminFee;
        $bookingCode = 'BK-' . strtoupper(uniqid());

        session([
            'checkout_data' => [
                'booking_code' => $bookingCode,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '-',
                'address' => $user->address ?? '-',
                'travel_date' => now()->addDays(7)->format('Y-m-d'),
                'notes' => null,
                'subtotal' => $subtotal,
                'admin_fee' => $adminFee,
                'total' => $total,
                'cart_items' => $cartItems->toArray(),
            ]
        ]);

        return redirect()->route('payment.index');
    }
}
