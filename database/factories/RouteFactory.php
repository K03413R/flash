<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class RouteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Route::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'color' => Arr::random(['red', 'blue', 'green', 'yellow', 'indigo']),
            'grade' => Arr::random(['5.8', '5.9', '5.10', '5.11'])
        ];
    }
}
