<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Show booking form untuk destination tertentu
    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('booking.show', compact('destination'));
    }

    // Simpan booking ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'guests' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:500'
        ]);

        $destination = Destination::findOrFail($validated['destination_id']);
        
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'destination_id' => $validated['destination_id'],
            'booking_date' => $validated['booking_date'],
            'guests' => $validated['guests'],
            'total_price' => $destination->price * $validated['guests'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending'
        ]);

        return redirect()->route('book.index')->with('success', 'Booking berhasil dibuat!');
    }

    // List semua booking user
    public function index()
    {
        $user = Auth::user();
        
        // Ambil semua booking user dengan relasi destination, diurutkan terbaru
        $bookings = Booking::with('destination')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Group booking berdasarkan booking_code
        $groupedBookings = $bookings->groupBy('booking_code');
        
        return view('booking.index', compact('groupedBookings'));
    }
}