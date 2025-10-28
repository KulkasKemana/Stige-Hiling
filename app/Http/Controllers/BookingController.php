<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Destination;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    /**
     * Tampilkan semua booking milik user
     */
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('destination')
            ->orderBy('created_at', 'desc')
            ->get();

        // Group by booking_code (BUKAN travel_date)
        $groupedBookings = $bookings->groupBy('booking_code');

        return view('booking.index', compact('groupedBookings'));
    }

    /**
     * Tampilkan halaman checkout (dari cart)
     */
    public function checkout()
    {
        $user = Auth::user();

        $cartItems = Cart::where('user_id', $user->id)
            ->where('status', 'active')
            ->with('destination')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty. Please add items first.');
        }

        return view('booking.checkout', compact('cartItems'));
    }

    /**
     * Proses checkout dan simpan ke session (lanjut ke pembayaran)
     */
    public function processCheckout(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'travel_date' => 'required|date|after_or_equal:today',
        ]);

        $cartItems = Cart::where('user_id', $user->id)
            ->where('status', 'active')
            ->with('destination')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        // hitung total harga
        $subtotal = 0;
        $cartData = [];

        foreach ($cartItems as $item) {
            $itemTotal = $item->destination->price * $item->quantity;
            $subtotal += $itemTotal;

            $cartData[] = [
                'destination_id' => $item->destination_id,
                'destination_name' => $item->destination->name,
                'quantity' => $item->quantity,
                'price' => $item->destination->price,
                'total_price' => $itemTotal,
            ];
        }

        $adminFee = 5000;
        $total = $subtotal + $adminFee;
        $bookingCode = 'BK' . strtoupper(uniqid());

        $checkoutData = [
            'booking_code' => $bookingCode,
            'name' => trim($validated['first_name'] . ' ' . ($validated['last_name'] ?? '')),
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'travel_date' => $validated['travel_date'],
            'subtotal' => $subtotal,
            'admin_fee' => $adminFee,
            'total' => $total,
            'cart_items' => $cartData,
            'notes' => $request->notes ?? null,
        ];

        session(['checkout_data' => $checkoutData]);

        return redirect()->route('payment.index');
    }

    /**
     * Tampilkan detail booking berdasarkan booking_code
     */
    public function detail($bookingCode)
    {
        $bookings = Booking::where('booking_code', $bookingCode)
            ->where('user_id', Auth::id())
            ->with('destination')
            ->get();

        if ($bookings->isEmpty()) {
            return redirect()->route('booking.index')
                ->with('error', 'Booking not found.');
        }

        $bookingInfo = $bookings->first();
        
        return view('booking.show', compact('bookings', 'bookingInfo', 'bookingCode'));
    }

    /**
     * Tampilkan form booking langsung (tanpa cart)
     */
    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('booking.create', compact('destination'));
    }

    /**
     * Simpan booking langsung tanpa cart
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'travel_date' => 'required|date|after_or_equal:today',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:500',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $destination = Destination::findOrFail($validated['destination_id']);
        $bookingCode = 'BK' . strtoupper(Str::random(8));

        Booking::create([
            'user_id' => Auth::id(),
            'destination_id' => $destination->id,
            'booking_code' => $bookingCode,
            'name' => $validated['name'] ?? Auth::user()->name,
            'email' => $validated['email'] ?? Auth::user()->email,
            'phone' => $validated['phone'] ?? '-',
            'address' => $validated['address'] ?? '-',
            'travel_date' => $validated['travel_date'],
            'quantity' => $validated['quantity'],
            'notes' => $validated['notes'] ?? null,
            'total_price' => $destination->price * $validated['quantity'],
            'payment_method' => 'pending',
            'payment_status' => 'pending',
        ]);

        return redirect()->route('booking.index')
            ->with('success', 'Booking created successfully!');
    }
}