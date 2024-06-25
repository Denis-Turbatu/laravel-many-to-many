<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $techList = ['Vue.js', 'React.js', 'Angular', 'Bootstrap', 'TailwindCSS', 'Jenkins', 'GitLab', 'Microsoft Azure', 'Google Cloud Platform'];

        foreach ($techList as $tech) {
            $newTech = new Technology();
            $newTech->name = $tech;
            $newTech->color = $faker->safeColorName();
            $newTech->save();
        }
    }
}
