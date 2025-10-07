<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * tampilkan form booking untuk destinasi tertentu
     */
    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('booking.ticket', compact('destination'));
    }

    /**
     * simpan booking baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'guests' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:500'
        ]);

        $destination = Destination::findOrFail($validated['destination_id']);

        // generate booking code unik untuk setiap pemesanan grup
        $bookingCode = strtoupper(Str::random(8));

        $booking = Booking::create([
            'booking_code' => $bookingCode,
            'user_id' => Auth::id(),
            'destination_id' => $validated['destination_id'],
            'booking_date' => $validated['booking_date'],
            'guests' => $validated['guests'],
            'total_price' => $destination->price * $validated['guests'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending'
        ]);

        return redirect()->route('booking.index')->with('success', 'Booking berhasil dibuat!');
    }

    /**
     * tampilkan semua booking milik user
     */
    public function index()
    {
        $groupedBookings = Booking::where('user_id', Auth::id())
            ->with('destination')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('booking_code');

        return view('booking.index', compact('groupedBookings'));
    }

    /**
     * tampilkan detail booking berdasarkan kode
     */
    public function detail($bookingCode)
    {
        $bookings = Booking::where('booking_code', $bookingCode)
            ->where('user_id', Auth::id())
            ->with('destination')
            ->get();

        if ($bookings->isEmpty()) {
            return redirect()->route('booking.index')->with('error', 'Booking tidak ditemukan');
        }

        $bookingInfo = $bookings->first();

        return view('booking.show', compact('bookings', 'bookingInfo'));
    }
}
