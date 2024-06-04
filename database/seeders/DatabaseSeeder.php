<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Language;
use App\Models\Type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            TypeSeeder::class,
            StatusSeeder::class,
            VehicleModelSeeder::class,
            LanguageSeeder::class,
            PaymentMethodSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
