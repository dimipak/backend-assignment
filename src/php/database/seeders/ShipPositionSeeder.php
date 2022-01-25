<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ShipPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://raw.githubusercontent.com/marinetraffic/backend-assignment/master/ship_positions.json');

        $shipPositions = json_decode($json, true);

        foreach ($shipPositions as $shipPosition) {

            DB::table('ship_positions')->insert([
                'mmsi' => $shipPosition['mmsi'],
                'status' => $shipPosition['status'],
                'station_id' => $shipPosition['stationId'],
                'speed' => $shipPosition['speed'],
                'lon' => $shipPosition['lon'],
                'lat' => $shipPosition['lat'],
                'course' => $shipPosition['course'],
                'heading' => $shipPosition['heading'],
                'rot' => $shipPosition['rot'],
                'timestamp' => Carbon::createFromTimestamp($shipPosition['timestamp'])
            ]);
        }

    }
}
