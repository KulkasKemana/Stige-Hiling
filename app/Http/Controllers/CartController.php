<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Destination;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the user's cart
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to view your cart.');
        }
        
        $cartItems = Cart::with('destination')
            ->forUser(Auth::id())
            ->active()
            ->get();
            
        $totalPrice = $cartItems->sum('total_price');
        
        return view('cart.index', compact('cartItems', 'totalPrice'));
    }
    
    /**
     * Add item to cart
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'quantity' => 'required|integer|min:1|max:10'
        ]);

        $destination = Destination::findOrFail($validated['destination_id']);

        // Cek apakah item sudah ada di cart
        $cartItem = Cart::where('user_id', Auth::id())
                       ->where('destination_id', $validated['destination_id'])
                       ->where('status', 'active')
                       ->first();

        if ($cartItem) {
            // Update quantity
            $cartItem->quantity += $validated['quantity'];
            $cartItem->save();
        } else {
            // Create new cart item
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
     * Update cart item quantity
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10'
        ]);
        
        $cartItem = Cart::where('user_id', Auth::id())
                       ->where('id', $id)
                       ->firstOrFail();
                       
        $cartItem->quantity = $request->quantity;
        $cartItem->save(); // Auto-calculate total_price di model
        
        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully',
            'total_price' => $cartItem->total_price
        ]);
    }
    
    /**
     * Remove item from cart
     */
    public function destroy($id)
    {
        try {
            $cartItem = Cart::where('user_id', Auth::id())
                          ->where('id', $id)
                          ->firstOrFail();
            
            $cartItem->delete();
            
            return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully.');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to remove item from cart.');
        }
    }
    
    /**
     * Clear all cart items
     */
    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully.');
    }
    
    /**
     * Checkout cart items
     */
    public function checkout(Request $request)
    {
        $cartItems = Cart::with('destination')
            ->where('user_id', Auth::id())
            ->where('status', 'active')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Create bookings for each cart item
        foreach ($cartItems as $item) {
            Booking::create([
                'user_id' => Auth::id(),
                'destination_id' => $item->destination_id,
                'booking_date' => now()->addDays(7), // Default 7 hari dari sekarang
                'guests' => $item->quantity,
                'total_price' => $item->total_price,
                'status' => 'pending'
            ]);
            
            // Mark cart item as checked out
            $item->update(['status' => 'checked_out']);
        }

        return redirect()->route('payment.index')->with('success', 'Checkout successful! Please proceed to payment.');
    }
}