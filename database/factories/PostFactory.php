<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => "Пост " . $this->faker->name(),
            'image' => "postimg.jpg",
            'text' => 'Большой фейковый текст длинного поста!',

            'user_id' => 1,
        ];
    }
}
