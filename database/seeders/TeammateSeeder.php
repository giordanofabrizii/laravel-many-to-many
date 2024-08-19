<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teammate;
use Faker\Generator as Faker;

class TeammateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 50; $i++) {
            $newTeammate = new Teammate();
            $newTeammate->name = $faker->unique()->name();
            $newTeammate->date_of_birth = $faker->date();
            $newTeammate->save();
        }
    }
}
