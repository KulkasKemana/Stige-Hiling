<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * List semua booking (booking/index.blade.php)
     */
    public function index()
    {
        $user = Auth::user();
        
        $bookings = Booking::with('destination')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        $groupedBookings = $bookings->groupBy('booking_code');
        
        return view('booking.index', compact('groupedBookings'));
    }

    /**
     * Detail ticket (booking/ticket.blade.php)
     */
    public function show($bookingCode)
    {
        $user = Auth::user();
        
        $bookings = Booking::with('destination')
            ->where('user_id', $user->id)
            ->where('booking_code', $bookingCode)
            ->get();
        
        if ($bookings->isEmpty()) {
            return redirect()->route('booking.index')
                ->with('error', 'Booking not found');
        }
        
        $bookingInfo = $bookings->first();
        
        return view('booking.ticket', compact('bookings', 'bookingInfo'));
    }
}