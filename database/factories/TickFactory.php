<?php

namespace Database\Factories;

use App\Models\Route;
use App\Models\Tick;
use Illuminate\Database\Eloquent\Factories\Factory;

class TickFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tick::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'route_id' => Route::factory(),
            'comment' => $this->faker->sentence
        ];
    }
}
