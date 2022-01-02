<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cat_title' => $this->faker->word ,
            'cat_desc' => $this->faker->word ,
            'cat_code' => $this->faker->word ,
            'cat_cover_img_url' => $this->faker->word ,
            'cat_max_student' => $this->faker->word ,
            'cat_status' => $this->faker->word ,
        ];
    }
}
