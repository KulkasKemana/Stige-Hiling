<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display the specified destination for booking
     */
    public function show($id)
    {
        try {
            $destination = Destination::findOrFail($id);
            
            // Debug - hapus setelah testing
            // dd($destination); // Uncomment ini untuk debug
            
            return view('booking.show', compact('destination'));
        } catch (\Exception $e) {
            return redirect()->route('destinations.index')->with('error', 'Destination not found.');
        }
    }
    
    /**
     * Store booking to cart
     */
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|integer',
            'quantity' => 'nullable|integer|min:1|max:10',
            'booking_date' => 'nullable|date|after_or_equal:today'
        ]);
        
        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                return redirect()->route('login')->with('message', 'Please login to book a destination.');
            }
            
            // Get destination for price snapshot
            $destination = Destination::findOrFail($request->destination_id);
            
            // Create or update cart item
            $cartItem = Cart::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'destination_id' => $request->destination_id
                ],
                [
                    'quantity' => $request->quantity ?? 1,
                    'booking_date' => $request->booking_date,
                    'price_snapshot' => $destination->price
                ]
            );
            
            return redirect()->route('cart.index')->with('success', 'Destination added to cart successfully!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to add to cart. Please try again.');
        }
    }
    
    /**
     * Remove from cart
     */
    public function destroy($id)
    {
        try {
            $cartItem = Cart::where('user_id', Auth::id())
                          ->where('id', $id)
                          ->firstOrFail();
            
            $cartItem->delete();
            
            return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to remove item from cart.');
        }
    }
}