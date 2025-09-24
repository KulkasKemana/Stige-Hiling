<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = [
            [
                'id' => 1,
                'name' => 'Makkah - Masjidil Haram',
                'location' => 'Saudi Arabia',
                'price' => 5000000,
                'duration' => '5 days',
                'image' => 'assets/masjid.png'
            ],
            [
                'id' => 2,
                'name' => 'Paris - Eiffel Tower',
                'location' => 'France',
                'price' => 4000000,
                'duration' => '4 days',
                'image' => 'assets/eifel.png'
            ],
            // Add more destinations as needed
        ];

        return view('destinations', ['destinations' => $destinations]);
    }
}
