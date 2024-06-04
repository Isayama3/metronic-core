<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::insert([
            [
                'id' => 1,
                'table_name' => 'rides',
                'name' => 'pending',
            ],
            [
                'id' => 2,
                'table_name' => 'rides',
                'name' => 'completed',
            ],
            [
                'id' => 3,
                'table_name' => 'rides',
                'name' => 'canceled',
            ],

            [
                'id' => 4,
                'table_name' => 'ride_requests',
                'name' => 'pending',
            ],
            [
                'id' => 5,
                'table_name' => 'ride_requests',
                'name' => 'accepted',
            ],
            [
                'id' => 6,
                'table_name' => 'ride_requests',
                'name' => 'rejected',
            ],

            [
                'id' => 7,
                'table_name' => 'user_verifications',
                'name' => 'reviewing',
            ],
            [
                'id' => 8,
                'table_name' => 'user_verifications',
                'name' => 'verified',
            ],
            [
                'id' => 9,
                'table_name' => 'user_verifications',
                'name' => 'unverified',
            ],
            [
                'id' => 10,
                'table_name' => 'user_verifications',
                'name' => 'rejected',
            ],

            [
                'id' => 11,
                'table_name' => 'vehicle_verifications',
                'name' => 'reviewing',
            ],
            [
                'id' => 12,
                'table_name' => 'vehicle_verifications',
                'name' => 'verified',
            ],
            [
                'id' => 13,
                'table_name' => 'vehicle_verifications',
                'name' => 'unverified',
            ],
            [
                'id' => 14,
                'table_name' => 'vehicle_verifications',
                'name' => 'rejected',
            ],
        ]);
    }
}
