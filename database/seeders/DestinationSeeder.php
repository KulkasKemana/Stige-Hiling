<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Masjid Nabawi',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.',
                'price' => 5000000,
                'duration' => '7 Days 6 Nights',
                'location' => 'Arab Saudi',
                'image' => 'assets/masjid.png',
                'rating' => 5.0,
                'category' => 'Religious'
            ],
            [
                'name' => 'Eiffel Tower',
                'description' => 'Experience the romance of Paris with iconic Eiffel Tower views and French culture.',
                'price' => 8000000,
                'duration' => '5 Days 4 Nights',
                'location' => 'Paris, France',
                'image' => 'assets/eifel.png',
                'rating' => 4.8,
                'category' => 'City Tour'
            ],
            [
                'name' => 'Japanese Shrine',
                'description' => 'Discover ancient traditions and serene temples in the heart of Japan.',
                'price' => 6500000,
                'duration' => '6 Days 5 Nights',
                'location' => 'Kyoto, Japan',
                'image' => 'assets/shrine.png',
                'rating' => 4.9,
                'category' => 'Cultural'
            ],
            [
                'name' => 'Beach Paradise',
                'description' => 'Relax on pristine beaches with crystal clear waters and tropical vibes.',
                'price' => 3500000,
                'duration' => '4 Days 3 Nights',
                'location' => 'Bali, Indonesia',
                'image' => 'assets/chill.png',
                'rating' => 4.7,
                'category' => 'Beach'
            ],
            [
                'name' => 'Mountain Adventure',
                'description' => 'Explore rugged terrains and breathtaking mountain landscapes.',
                'price' => 4000000,
                'duration' => '5 Days 4 Nights',
                'location' => 'Iceland',
                'image' => 'assets/jeep.png',
                'rating' => 4.6,
                'category' => 'Adventure'
            ]
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}