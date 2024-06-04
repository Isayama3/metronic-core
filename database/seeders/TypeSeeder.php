<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::insert([
            [
                'id' => 1,
                'table_name' => 'admins',
                'name' => 'super_admin',
            ],
            [
                'id' => 2,
                'table_name' => 'admins',
                'name' => 'admin',
            ],
            [
                'id' => 3,
                'table_name' => 'vehicle_types',
                'name' => 'car',
            ],
            [
                'id' => 4,
                'table_name' => 'vehicle_types',
                'name' => 'scoter',
            ],
            [
                'id' => 5,
                'table_name' => 'saved_places',
                'name' => 'home',
            ],
            [
                'id' => 6,
                'table_name' => 'saved_places',
                'name' => 'work',
            ],
        ]);
    }
}
