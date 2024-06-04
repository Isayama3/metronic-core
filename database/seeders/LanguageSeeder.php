<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Type;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::insert([
            [
                'name' => 'ar',
            ],
            [
                'name' => 'en',
            ],
        ]);
    }
}
