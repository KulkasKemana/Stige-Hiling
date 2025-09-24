<?php
// FILE: app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
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
                       
        $cartItem->update([
            'quantity' => $request->quantity
        ]);
        
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
}