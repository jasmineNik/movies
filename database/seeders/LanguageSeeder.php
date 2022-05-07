<?php

namespace Database\Seeders;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::factory()
        ->state(new Sequence(
            ["name" => "Armenia"],
            ["name" => "English"],
        ))
        ->count(2)->create();
    }
}
