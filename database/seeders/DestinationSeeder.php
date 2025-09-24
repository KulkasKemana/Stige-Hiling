<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Tokyo, Japan',
                'description' => 'Explore the vibrant culture and modern attractions of Tokyo',
                'image' => 'assets/tokyo.jpg',
                'price' => 15000000,
                'location' => 'Tokyo, Japan',
                'duration' => '5 days 4 nights',
                'category' => 'city',
                'status' => 'active',
                'features' => json_encode(['Accommodation', 'Meals', 'Transportation', 'Tour Guide'])
            ],
            [
                'name' => 'Bali, Indonesia',
                'description' => 'Experience the beautiful beaches and rich culture of Bali',
                'image' => 'assets/bali.jpg',
                'price' => 8500000,
                'location' => 'Bali, Indonesia',
                'duration' => '4 days 3 nights',
                'category' => 'nature',
                'status' => 'active',
                'features' => json_encode(['Accommodation', 'Meals', 'Transportation', 'Tour Guide'])
            ],
            [
                'name' => 'Paris, France',
                'description' => 'Discover the romance and beauty of the City of Light',
                'image' => 'assets/paris.jpg',
                'price' => 18000000,
                'location' => 'Paris, France',
                'duration' => '6 days 5 nights',
                'category' => 'city',
                'status' => 'active',
                'features' => json_encode(['Accommodation', 'Meals', 'Transportation', 'Tour Guide'])
            ],
            [
                'name' => 'Yogyakarta, Indonesia',
                'description' => 'Explore the cultural heart of Java with ancient temples and traditional arts',
                'image' => 'assets/yogya.jpg',
                'price' => 3500000,
                'location' => 'Yogyakarta, Indonesia',
                'duration' => '3 days 2 nights',
                'category' => 'cultural',
                'status' => 'active',
                'features' => json_encode(['Accommodation', 'Meals', 'Transportation', 'Tour Guide'])
            ],
            [
                'name' => 'Rome, Italy',
                'description' => 'Walk through history in the Eternal City',
                'image' => 'assets/rome.jpg',
                'price' => 16500000,
                'location' => 'Rome, Italy',
                'duration' => '5 days 4 nights',
                'category' => 'cultural',
                'status' => 'active',
                'features' => json_encode(['Accommodation', 'Meals', 'Transportation', 'Tour Guide'])
            ],
            [
                'name' => 'Beijing, China',
                'description' => 'Experience ancient wonders and modern marvels in China\'s capital',
                'image' => 'assets/beijing.jpg',
                'price' => 12000000,
                'location' => 'Beijing, China',
                'duration' => '4 days 3 nights',
                'category' => 'cultural',
                'status' => 'active',
                'features' => json_encode(['Accommodation', 'Meals', 'Transportation', 'Tour Guide'])
            ]
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}