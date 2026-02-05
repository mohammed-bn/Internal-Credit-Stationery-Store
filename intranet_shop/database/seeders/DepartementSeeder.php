<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Departement::create(['title' =>'admin']);
        Departement::create(['title' =>'security']);
        Departement::create(['title' =>'reception']);
        Departement::create(['title' =>'cleaning']);
        Departement::create(['title' =>'resources humaines']);
        Departement::create(['title' =>'it support']);

    }
}
