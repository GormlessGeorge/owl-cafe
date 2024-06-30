<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,  // Имя блюда
            'ingredients' => $this->faker->sentence,
            'is_favourite' => $this->faker->boolean,  // Состав блюда
            'weight' => $this->faker->numberBetween(100, 500),  // Граммовка блюда
            'price' => $this->faker->randomFloat(2, 1, 100),  // Цена блюда
            'image_path' => $this->faker->imageUrl(),  // Путь к изображению блюда
            'category_id' => \App\Models\Category::factory(),  // Внешний ключ к таблице categories
        ];
    }
}
