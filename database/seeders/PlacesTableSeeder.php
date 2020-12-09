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
            ]
          ];

        //Place::create($places);
        DB::table('places')->insert($places);
    }
}
