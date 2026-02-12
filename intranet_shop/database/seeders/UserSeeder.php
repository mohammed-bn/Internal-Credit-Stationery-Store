<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Departement;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        User::factory()->count(60)->create();


        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => \Hash::make('password'),
            'role_id' => Role::where('title', 'admin')->first()->id,
            'departement_id' => Departement::where('title', 'admin')->first()->id
        ]);
        User::factory()->create([
            'name' => 'manager',
            'email' => 'manager@example.com',
            'password' => \Hash::make('password'),
            'role_id' => Role::where('title', 'manager')->first()->id,
            'departement_id' => Departement::where('title', 'admin')->first()->id
        ]);
        User::factory()->create([
            'name' => 'employee',
            'email' => 'employee@example.com',
            'password' => \Hash::make('password'),
            'role_id' => Role::where('title', 'employee')->first()->id,
            'departement_id' => Departement::where('title', 'admin')->first()->id
        ]);
    }
}
