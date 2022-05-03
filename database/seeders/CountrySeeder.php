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
            ["name" => "Armenia"],["iso_code"=>"AM"],    
            ["name" => "Russian"],["iso_code"=>"RU"],
            ["name" => "Afghanistan"],["iso_code"=>"AFG"],
            ["name" => "India"],["iso_code"=>"IND"],
            ["name" => "Germany"],["iso_code"=>"DE"],
            ["name" => "Greece"],["iso_code"=>"GR"],
            ["name" => "Iraq"],["iso_code"=>"IQ"],
            ["name" => "Mexico"],["iso_code"=>"MX"],
            ["name" => "Qatar"],["iso_code"=>"QA"],
            ["name" => "Sri Lanka"],["iso_code"=>"LK"],
                           ))
        ->count(2)->create();
    }
}
