<?php

namespace Database\Factories;

use App\Models\OrganizationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrganizationType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'org_type_name' => $this->faker->word. ' ' .  $this->faker->word ,
        ];
    }
}
