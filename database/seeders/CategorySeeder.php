<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->state(new Sequence(
                ["name" => "Action"],
                ["name" => "Adventure"],
                ["name" => "Animal"],
                ["name" => "Animated"],
                ["name" => "Comedy"],
                ["name" => "Documentary"],
                ["name" => "Dramma"],
                ["name" => "Horror"],
                ["name" => "Romance"],
                ["name" => "Musical"],
                ["name" => "War"],



                
            ))
            ->count(11)->create();
    }
}
