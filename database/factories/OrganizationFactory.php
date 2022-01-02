<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => "Abdulhafiz",
            'lastname' => "Abdulfatai",
            'email' => 'hafiz227@gmail.com',
            'phone' => '081011599999',
            'org_name' => 'WWE',
            'about_org' => 'We Wrestle',
            'approved' => '1',
            'org_type_no' => '1',
            'org_address' => '11 e Nass',
            'state_no' => '1',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
