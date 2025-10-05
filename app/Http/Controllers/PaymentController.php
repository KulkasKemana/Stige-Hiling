<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Cart;

class PaymentController extends Controller
{
    /**
     * Tampilkan halaman payment
     */
    public function index()
    {
        // Cek apakah ada data checkout di session
        if (!session()->has('checkout_data')) {
            return redirect()->route('cart.index')
                ->with('error', 'Data checkout tidak ditemukan. Silakan checkout ulang.');
        }

        $checkoutData = session('checkout_data');
        
        return view('payment.index', compact('checkoutData'));
    }

    /**
     * Proses payment (simpan booking & hapus cart)
     */
    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'payment_proof' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek session checkout data
        if (!session()->has('checkout_data')) {
            return redirect()->route('cart.index')
                ->with('error', 'Session expired. Silakan checkout ulang.');
        }

        $checkoutData = session('checkout_data');
        $user = Auth::user();

        // Upload payment proof jika ada
        $paymentProofPath = null;
        if ($request->hasFile('payment_proof')) {
            $paymentProofPath = $request->file('payment_proof')
                ->store('payment_proofs', 'public');
        }

        // Simpan booking untuk setiap item di cart
        foreach ($checkoutData['cart_items'] as $item) {
            Booking::create([
                'user_id' => $user->id,
                'destination_id' => $item['destination_id'],
                'booking_code' => $checkoutData['booking_code'],
                'name' => $checkoutData['name'],
                'email' => $checkoutData['email'],
                'phone' => $checkoutData['phone'],
                'address' => $checkoutData['address'],
                'travel_date' => $checkoutData['travel_date'],
                'quantity' => $item['quantity'],
                'total_price' => $item['total_price'],
                'payment_method' => $request->payment_method,
                'payment_proof' => $paymentProofPath,
                'payment_status' => 'pending',
                'notes' => $checkoutData['notes'] ?? null,
            ]);
        }

        // Update status cart menjadi 'checked_out' (bukan delete)
        Cart::where('user_id', $user->id)
            ->where('status', 'active')
            ->update(['status' => 'checked_out']);

        // Simpan booking code ke session untuk halaman success
        session([
            'last_booking_code' => $checkoutData['booking_code'],
            'last_booking_total' => $checkoutData['total'],
        ]);

        // Hapus checkout data dari session
        session()->forget('checkout_data');

        return redirect()->route('payment.success');
    }

    /**
     * Halaman payment success
     */
    public function success()
    {
        if (!session()->has('last_booking_code')) {
            return redirect()->route('home');
        }

        $bookingCode = session('last_booking_code');
        $total = session('last_booking_total');

        return view('payment.success', compact('bookingCode', 'total'));
    }

    /**
     * Halaman payment failed
     */
    public function failed()
    {
        return view('payment.failed');
    }
}