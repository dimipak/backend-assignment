<?php

namespace Tests\Feature;

use App\Models\ShipPosition;
use Carbon\CarbonInterface;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class ShipPositionTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test pagination
     *
     * @return void
     */
    public function test_get_ship_positions_paginated()
    {
        $perPage = 12;

        ShipPosition::factory()->count(20)->create();

        $response = $this->get('/v1/vessels/get', ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJsonCount($perPage, 'data.ship_positions');
    }

    /**
     * Test mmsi single filtering
     *
     * @return void
     */
    public function test_get_ship_positions_mmsi_filtering()
    {
        $mmsi = rand(111111111, 999999999);

        ShipPosition::factory()->count(20)->create();
        ShipPosition::factory([
            'mmsi' => $mmsi
        ])->create();

        $queryData = http_build_query([
            'mmsi' => $mmsi
        ]);

        $response = $this->get("/v1/vessels/get?$queryData", ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data.ship_positions');
    }

    /**
     * Test date filtering
     *
     * @return void
     */
    public function test_get_ship_positions_date_filtering()
    {
        $dateTime = Carbon::now()->format(CarbonInterface::DEFAULT_TO_STRING_FORMAT);

        ShipPosition::factory([
            'timestamp' => Carbon::now()->subDays(10)->format(CarbonInterface::DEFAULT_TO_STRING_FORMAT)
        ])->count(20)->create();

        ShipPosition::factory([
            'timestamp' => $dateTime
        ])->count(5)->create();

        $queryData = http_build_query([
            'date' => Carbon::now()->subDay()->format(CarbonInterface::DEFAULT_TO_STRING_FORMAT) . "," . Carbon::now()->addDay()->format(CarbonInterface::DEFAULT_TO_STRING_FORMAT)
        ]);

        $response = $this->get("/v1/vessels/get?$queryData", ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data.ship_positions');
    }

    /**
     * Test date filtering
     *
     * @return void
     */
    public function test_get_ship_positions_geo_filtering()
    {
        ShipPosition::factory([
            'lon' => '20.0000000',
            'lat' => '20.0000000'
        ])->count(20)->create();

        ShipPosition::factory([
            'lon' => '40.0000000',
            'lat' => '40.0000000'
        ])->count(5)->create();

        $queryData = http_build_query([
            'geo' => "40.0000000,40.0000000,1"
        ]);

        $response = $this->get("/v1/vessels/get?$queryData", ['Accept' => 'application/json']);

        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data.ship_positions');
    }
}
