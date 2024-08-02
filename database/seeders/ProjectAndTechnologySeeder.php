<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use Faker\Generator as Faker;

class ProjectAndTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = Project::all();
        $technologies = Technology::all()->pluck('id');

        foreach ($projects as $project) {
            // foreach project add a rand number of technologies
            $project->technologies()->attach($faker->randomElements($technologies, rand(1, 3)));
        }
    }
}
