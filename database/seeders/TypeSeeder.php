<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Front-End',
                'color' => 'blue'
            ],
            [
                'name' => 'Back-End',
                'color' => 'green'
            ],
            [
                'name' => 'Full Stack',
                'color' => 'orange'
            ],
        ];

        foreach ($types as $typeData) {
            $newtype = new Type($typeData);
            $newtype->save();
        }
    }
}
