<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("INSERT INTO `vehicle_models` (`name`) VALUES
            ('aston martin'),
            ('tesla'),
            ('jaguar'),
            ('maserati'),
            ('rolls royce'),
            ('toyota'),
            ('mercedes-benz'),
            ('bmw'),
            ('bugatti'),
            ('mini'),
            ('ford'),
            ('lincoln'),
            ('mercury'),
            ('lotus'),
            ('chevrolet'),
            ('cadillac'),
            ('opel'),
            ('gmc'),
            ('mazda'),
            ('honda'),
            ('acura'),
            ('dodge'),
            ('chrysler'),
            ('nissan'),
            ('infiniti'),
            ('mitsubishi'),
            ('volkswagen'),
            ('volvo'),
            ('fiat'),
            ('alfa romeo'),
            ('hyundai'),
            ('kia'),
            ('lamborghini'),
            ('smart'),
            ('suzuki'),
            ('lexus'),
            ('subaru'),
            ('maybach'),
            ('pontiac'),
            ('isuzu'),
            ('saab'),
            ('audi'),
            ('bentley'),
            ('porsche'),
            ('ferrari'),
            ('daihatsu'),
            ('daewoo'),
            ('koenigsegg'),
            ('byd'),
            ('mclaren'),
            ('mosler'),
            ('pagani'),
            ('genesis'),
            ('peugeot'),
            ('datsun'),
            ('polestar'),
            ('lucid motors'),
            ('baic'),
            ('bestune'),
            ('changan'),
            ('chery'),
            ('jeep'),
            ('jetour'),
            ('land rover'),
            ('ram'),
            ('rivian'),
            ('voyah'),
            ('renault'),
            ('mg');
        ");
    }
}
