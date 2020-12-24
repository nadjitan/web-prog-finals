<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::truncate();

        $places =  [
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Caticlan – Boracay',
              'destination_short' => 'MPH',
              'price' => 4000,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Tuguegarao',
              'destination_short' => 'TUG',
              'price' => 4600,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Virac, Catanduanes',
              'destination_short' => 'VRC',
              'price' => 3500,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Kalibo – Boracay',
              'destination_short' => 'KLO',
              'price' => 3700,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Roxas, Capiz',
              'destination_short' => 'RXS',
              'price' => 4400,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Iloilo',
              'destination_short' => 'ILO',
              'price' => 3100,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Bacolod',
              'destination_short' => 'BCD',
              'price' => 5000,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Tacloban',
              'destination_short' => 'TAC',
              'price' => 4200,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Cebu',
              'destination_short' => 'CEB',
              'price' => 4000,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Bohol',
              'destination_short' => 'TAG',
              'price' => 3500,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Cagayan De Oro',
              'destination_short' => 'CGY',
              'price' => 4700,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'Davao',
              'destination_short' => 'DVO',
              'price' => 3800,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Manila',
              'origin_short' => 'MNL',
              'destination' => 'San Jose – Mindoro',
              'destination_short' => 'SJI',
              'price' => 4000,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Clark',
              'origin_short' => 'CRK',
              'destination' => 'Caticlan – Boracay',
              'destination_short' => 'MPH',
              'price' => 3600,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Clark',
              'origin_short' => 'CRK',
              'destination' => 'Iloilo',
              'destination_short' => 'ILO',
              'price' => 2900,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Clark',
              'origin_short' => 'CRK',
              'destination' => 'Bacolod',
              'destination_short' => 'BCD',
              'price' => 4500,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Clark',
              'origin_short' => 'CRK',
              'destination' => 'Cebu',
              'destination_short' => 'CEB',
              'price' => 5800,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Caticlan – Boracay',
              'origin_short' => 'MPH',
              'destination' => 'Cebu',
              'destination_short' => 'CEB',
              'price' => 3500,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Iloilo',
              'origin_short' => 'ILO',
              'destination' => 'Davao',
              'destination_short' => 'DVO',
              'price' => 3600,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Bacolod',
              'origin_short' => 'BCD',
              'destination' => 'Cebu',
              'destination_short' => 'CEB',
              'price' => 3700,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Bacolod',
              'origin_short' => 'BCD',
              'destination' => 'Davao',
              'destination_short' => 'DVO',
              'price' => 4700,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Tacloban',
              'origin_short' => 'TAC',
              'destination' => 'Cebu',
              'destination_short' => 'CEB',
              'price' => 3700,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Cebu',
              'origin_short' => 'CEB',
              'destination' => 'Cagayan de Oro',
              'destination_short' => 'CGY',
              'price' => 3000,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Cebu',
              'origin_short' => 'CEB',
              'destination' => 'Davao',
              'destination_short' => 'DVO',
              'price' => 2900,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Bohol',
              'origin_short' => 'TAG',
              'destination' => 'Davao',
              'destination_short' => 'DVO',
              'price' => 3500,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
              'origin' => 'Cagayan de Oro',
              'origin_short' => 'CGY',
              'destination' => 'Davao',
              'destination_short' => 'DVO',
              'price' => 3400,
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
          ];

        //Place::create($places);
        DB::table('places')->insert($places);
    }
}
