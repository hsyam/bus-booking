<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plate_number' => $this->faker->numberBetween(11111,99999),
            'driver_name' => $this->faker->name,
            'driver_phone' => $this->faker->phoneNumber,

        ];
    }
}
