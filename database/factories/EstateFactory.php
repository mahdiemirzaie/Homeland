<?php

namespace Database\Factories;

use App\Enums\TableEstateFildTypeEnum;
use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estate>
 */
class EstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'area' => $this->faker->randomNumber(),
            'floor' => $this->faker->randomNumber(),
            'WC' => $this->faker->randomNumber(),
            'room' => $this->faker->randomNumber(),
            'type'=> TableEstateFildTypeEnum::Villa->value,
            'parking' => $this->faker->boolean,
            'elevator' => $this->faker->boolean,
            'storehouse' => $this->faker->boolean,
            'totalPrice' => $this->faker->numberBetween(1000, 10000),
            'mortgage' => $this->faker->randomNumber(),
            'rent' => $this->faker->randomNumber(),
            'user_id' => User::factory(),
            'category_id'=>Category::factory(),
            'city_id'=>City::factory(),
        ];
    }
}
