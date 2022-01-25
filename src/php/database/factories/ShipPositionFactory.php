<?php

namespace Database\Factories;

use App\Models\ShipPosition;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShipPositionFactory extends Factory
{
    protected $model = ShipPosition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mmsi' => $this->faker->numerify('#########'),
            'status' => $this->faker->boolean,
            'station_id' => $this->faker->numberBetween('100', '999'),
            'speed' => $this->faker->numerify('###.##'),
            'lon' => $this->faker->numerify('##.#######'),
            'lat' => $this->faker->numerify('##.#######'),
            'course' => $this->faker->numberBetween('100', '999'),
            'heading' => $this->faker->numberBetween('100', '999'),
            'rot' => "",
            'timestamp' => $this->faker->dateTime
        ];
    }
}
