<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\Type;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::insert([
            [
                'name' => 'cash',
                'active' => true
            ],
            [
                'name' => 'card',
                'active' => false
            ],
            [
                'name' => 'paypal',
                'active' => false
            ],

        ]);
    }
}
