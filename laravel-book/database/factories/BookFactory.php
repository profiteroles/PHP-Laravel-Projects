<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->title(),
            'author'=>$this->faker->name(),
            'desc'=>$this->faker->paragraph(),
            'published_year'=> $this->faker->year()
        ];
    }
}
