<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;

        return [
            'category_id' => Category::factory(),
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'pricing' => $this->faker->randomFloat(0, 10000, 1000000),
            'url_image' => 'https://picsum.photos/200/100',
            'status' => $this->faker->boolean,
        ];
    }
}
