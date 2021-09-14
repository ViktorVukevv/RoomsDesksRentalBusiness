<?php

namespace Database\Factories;

use App\Models\Desk;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Desk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_id' => $this->faker->randomNumber(1, 12),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 4, $max = 100),
            'size' => $this->faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 10),
            'position' => $this->faker->text(20),
            'is_taken' => $this->faker->boolean(),
            'paid_time' => $this->faker->numberBetween($min = 1, $max = 50),
            'created_at' => now()
        ];
    }
}
