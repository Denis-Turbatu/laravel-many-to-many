<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker\Factory::create('it_IT');

        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->thumb = $faker->imageUrl(640, 480, true);
            $newProject->description = $faker->paragraph();
            $newProject->start_date = $faker->dateTimeBetween('0 week', '+1 week');;
            $newProject->end_date = $faker->dateTimeBetween('+5 week', '+6 week');;
            // $newProject->type = $this->getRandomType($faker);
            $newProject->slug = Str::slug($newProject->title . '-' . $faker->numerify('####'));

            $newProject->save(); 
        }
    }

    private function getRandomType($faker): string
    {
        $type = ['Social Media', 'E-Commerce', 'Web Portal', 'Landing Page', 'Community'];
        return $faker->randomElement($type);
    }
}
