<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'HTML',
            ],
            [
                'name' => 'CSS',
            ],
            [
                'name' => 'JavaScript',
            ],
            [
                'name' => 'VueJs',
            ],
            [
                'name' => 'MySQL',
            ],
            [
                'name' => 'PHP',
            ],
            [
                'name' => 'Laravel',
            ],
        ];

        foreach ($technologies as $technologyData) {
            $newTechnology = new Technology($technologyData);
            $newTechnology->save();
        }
    }
}
