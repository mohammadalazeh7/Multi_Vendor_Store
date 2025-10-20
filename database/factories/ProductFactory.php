<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $name = $this->faker->unique()->words(5, true);
        return [
            //
            "name" => $name,
            'slug' => Str::slug($name),
            "description"=> $this->faker->sentence(10),
            // 'image' => asset('assets/images/product_photo.png') ,
            'image' => 'product_photo.png',
            'price'=> $this->faker->randomFloat(2,1,499),
            'compare_price'=> $this->faker->randomFloat( 2,500,999),
            'category_id'=> Category::inRandomOrder()->first()->id,
            'featured' => rand(0,1),
            'store_id'=>Store::inRandomOrder()->first()->id
        ];
    }
}

