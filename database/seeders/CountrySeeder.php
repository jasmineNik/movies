<?php

namespace Database\Seeders;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::factory()
        ->state(new Sequence(
            ["name" => "Armenia","iso_code"=>"Am"],
            ["name" => "English","iso_code"=>"En"],
        ))
        ->count(2)->create();
    }
}
