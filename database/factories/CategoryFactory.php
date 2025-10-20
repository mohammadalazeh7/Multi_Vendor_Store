<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2, true);
        return [
            "name" => $name,
            "slug" => Str::slug($name),
            "description" => $this->faker->sentence(10),
            // Correct: use ID if category exists, otherwise null
            'parent_id' => Category::inRandomOrder()->first()?->id,
            // 'image' => $this->faker->imageUrl(),
            'image' => asset('assets/images/placeholders/800x500.svg'),
            'status' => $this->faker->randomElement(['active', 'archived']),
        ];
    }
}
