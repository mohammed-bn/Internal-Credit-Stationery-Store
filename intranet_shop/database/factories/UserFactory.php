<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'=>fake()->name(),
            'email'=>fake()->email(),
            'password'=>Hash::make('password'),
            'role_id'=> rand(2,3),
            'departement_id'=>rand(2,6),
        ];
    }
}
