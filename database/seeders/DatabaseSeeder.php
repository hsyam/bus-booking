<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Route;
use App\Models\RoutesStation;
use App\Models\Station;
use App\Models\Trip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Station::query()->insert([
            [
                'name' => 'Cairo' ,
                'lat' => 30.0594838,
                'long' => 31.223359,
            ],
            [
                'name' => 'Giza' ,
                'lat' => 30.0167836,
                'long' => 31.1545378,
            ],
            [
                'name' => 'AlFayyum' ,
                'lat' => 29.3465038,
                'long' => 30.2104706,
            ],            [
                'name' => 'AlMinya' ,
                'lat' => 28.0952187,
                'long' => 30.7156159,
            ],            [
                'name' => 'Asyut' ,
                'lat' => 27.1770325,
                'long' => 31.1668655,
            ],            [
                'name' => 'Sohag' ,
                'lat' => 26.5604597,
                'long' => 31.6804728,
            ],            [
                'name' => 'Qena' ,
                'lat' => 26.1712405,
                'long' => 32.6863769,
            ],
        ]);

        Route::query()->insert([

            [
                'name' => 'cairo - qena' ,
            ],
            [
                'name' => 'cairo - AlMinya' ,
            ],
            [
                'name' => 'cairo - Sohag' ,
            ],
            [
                'name' => 'qena - cairo' ,
            ],

            [
                'name' => 'Sohag - Giza' ,
            ],



        ]);
        RoutesStation::query()->insert([
            [
                'route_id' => 1,
                'station_id' => 1 ,
                'station_order' =>1 ,
            ],
            [
                'route_id' => 1,
                'station_id' => 2 ,
                'station_order' =>2 ,
            ],
            [
                'route_id' => 1,
                'station_id' => 3 ,
                'station_order' =>3 ,
            ],

            [
                'route_id' => 1,
                'station_id' => 4 ,
                'station_order' =>4 ,
            ],

            [
                'route_id' => 1,
                'station_id' => 5 ,
                'station_order' =>5 ,
            ],

            [
                'route_id' => 1,
                'station_id' => 6 ,
                'station_order' =>6 ,
            ],
            [
                'route_id' => 1,
                'station_id' => 7 ,
                'station_order' =>7 ,
            ],
            [
                'route_id' => 2,
                'station_id' => 1 ,
                'station_order' =>1 ,
            ],
            [
                'route_id' => 2,
                'station_id' => 2 ,
                'station_order' =>2 ,
            ],
            [
                'route_id' => 2,
                'station_id' => 3 ,
                'station_order' =>3 ,
            ],

            [
                'route_id' => 2,
                'station_id' => 4 ,
                'station_order' =>4 ,
            ],
            [
                'route_id' => 3,
                'station_id' => 1 ,
                'station_order' =>1 ,
            ],
            [
                'route_id' => 3,
                'station_id' => 2 ,
                'station_order' =>2 ,
            ],
            [
                'route_id' => 3,
                'station_id' => 3 ,
                'station_order' =>3 ,
            ],

            [
                'route_id' => 3,
                'station_id' => 4 ,
                'station_order' =>4 ,
            ],

            [
                'route_id' => 3,
                'station_id' => 5 ,
                'station_order' =>5 ,
            ],
            [
                'route_id' => 3,
                'station_id' => 6 ,
                'station_order' =>6 ,
            ],

            [
                'route_id' => 4,
                'station_id' => 1 ,
                'station_order' =>7 ,
            ],
            [
                'route_id' => 4,
                'station_id' => 2 ,
                'station_order' =>6 ,
            ],
            [
                'route_id' => 4,
                'station_id' => 3 ,
                'station_order' =>5 ,
            ],

            [
                'route_id' => 4,
                'station_id' => 4 ,
                'station_order' =>4 ,
            ],

            [
                'route_id' => 4,
                'station_id' => 5 ,
                'station_order' =>3 ,
            ],

            [
                'route_id' => 4,
                'station_id' => 6 ,
                'station_order' =>2 ,
            ],
            [
                'route_id' => 4,
                'station_id' => 7 ,
                'station_order' =>1 ,
            ],
            [
                'route_id' => 5,
                'station_id' => 6 ,
                'station_order' =>1 ,
            ],
            [
                'route_id' => 5,
                'station_id' => 5 ,
                'station_order' =>2 ,
            ],
            [
                'route_id' => 5,
                'station_id' => 4 ,
                'station_order' =>3 ,
            ],
            [
                'route_id' => 5,
                'station_id' => 3 ,
                'station_order' =>4 ,
            ],

            [
                'route_id' => 5,
                'station_id' => 2 ,
                'station_order' =>5 ,
            ],

        ]);

        Bus::factory()->times(5)->create();
        Trip::query()->insert([
            [
                'bus_id' => 1 ,
                'route_id' => 1 ,
                'trip_number' => Str::random(5)
            ],
            [
                'bus_id' => 2 ,
                'route_id' => 2 ,
                'trip_number' => Str::random(5)
            ],
            [
                'bus_id' => 3 ,
                'route_id' => 3 ,
                'trip_number' => Str::random(5)
            ],
            [
                'bus_id' => 4 ,
                'route_id' => 4 ,
                'trip_number' => Str::random(5)
            ],
            [
                'bus_id' => 5 ,
                'route_id' => 5 ,
                'trip_number' => Str::random(5)
            ]
        ]);
    }
}
