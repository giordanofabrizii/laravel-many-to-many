<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = [
            [
                'title' => 'Discord',
                // 'image' => 'https'
            ],
            [
                'title' => 'Dropbox'
            ],
            [
                'title' => 'BoolsApp'
            ],
        ];

        foreach ($projects as $projectData) {
            $newproject = new Project($projectData);
            $newproject->image = $faker->imageUrl(400,250, 'posts');
            $newproject->save();
        }
    }
}
