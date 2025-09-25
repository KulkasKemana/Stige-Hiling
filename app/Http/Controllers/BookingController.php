<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function show($id)
    {
        // data dummy (sementara)
        $destinations = [
            1 => [
                'id' => 1,
                'name' => 'Kyoto',
                'price' => 2500000,
                'duration' => '5 Days',
                'description' => 'Explore the beauty of Kyoto with traditional temples and gardens.',
                'image' => 'assets/destinations/kyoto.jpg'
            ],
            2 => [
                'id' => 2,
                'name' => 'Bali',
                'price' => 1500000,
                'duration' => '3 Days',
                'description' => 'Enjoy the beaches and culture of Bali with amazing vibes.',
                'image' => 'assets/destinations/bali.jpg'
            ],
            3 => [
                'id' => 3,
                'name' => 'Rome',
                'price' => 4000000,
                'duration' => '7 Days',
                'description' => 'Visit the historical city of Rome with all its monuments.',
                'image' => 'assets/destinations/rome.jpg'
            ],
        ];

        if (!isset($destinations[$id])) {
            abort(404, 'Destination not found');
        }

        $destination = $destinations[$id];

        return view('booking.show', compact('destination'));
    }

    public function store(Request $request)
    {
        // nanti buat simpan booking user
        return redirect()->route('book.index')->with('success', 'Booking berhasil!');
    }

    public function index()
    {
        return view('booking.index'); // isi sesuai kebutuhan
    }
}
