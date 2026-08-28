<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Standard Room',
                'type' => 'standard',
                'price' => 350000,
                'capacity' => 2,
                'description' => 'Kamar nyaman dengan fasilitas dasar lengkap, cocok untuk solo traveler atau pasangan.',
                'photo_url' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Deluxe Room',
                'type' => 'deluxe',
                'price' => 550000,
                'capacity' => 2,
                'description' => 'Kamar lebih luas dengan pemandangan taman dan fasilitas tambahan.',
                'photo_url' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Family Suite',
                'type' => 'suite',
                'price' => 850000,
                'capacity' => 4,
                'description' => 'Cocok untuk keluarga, terdiri dari 2 kamar tidur dan ruang tamu kecil.',
                'photo_url' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Private Villa',
                'type' => 'villa',
                'price' => 1500000,
                'capacity' => 6,
                'description' => 'Villa privat dengan kolam renang pribadi, cocok untuk acara keluarga atau grup.',
                'photo_url' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Budget Room',
                'type' => 'standard',
                'price' => 200000,
                'capacity' => 1,
                'description' => 'Kamar hemat untuk yang cuma butuh tempat tidur nyaman semalam.',
                'photo_url' => null,
                'is_active' => true,
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
