<?php

namespace Database\Seeders;

use App\Base\Models\Language;
use Illuminate\Database\Seeder;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'English',
            'locale' => 'en',
            'dir' => 'ltr'
        ]);

        Language::create([
            'name' => 'Arabic',
            'locale' => 'ar',
            'dir' => 'rtl'
        ]);
    }
}
