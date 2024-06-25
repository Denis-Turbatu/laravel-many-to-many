<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // prendo gia i ipi di progetto
        $typeArray = ['Social Media', 'E-Commerce', 'Web Portal', 'Landing Page', 'Community'];
        foreach ($typeArray as $type) {
            $newType = new Type();
            $newType->title = $type;
            $newType->save();
        }
    }
}
