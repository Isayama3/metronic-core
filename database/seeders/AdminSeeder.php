<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'full_name' => 'admin',
            'email' => 'admin@admin.com',
            'country_code' => 'US',
            'phone' => '1234567890',
            'password' => '123@Admin',
            'active' => true,
            'country_id' => 1,
            'language_id' => 1,
            'type_id' => 1,
            'remember_token' => Str::random(16),
        ]);
    }
}
