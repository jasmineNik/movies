<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Language;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        Movie::factory()
            ->hasAttached(
                $categories
            )
            ->count(10)
            ->create();
    }
}
