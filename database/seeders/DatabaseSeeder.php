<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return DatabaseSeeder
     */
    public function run(): DatabaseSeeder
    {
       return $this->call([
           UserSeeder::class,
           CategorySeeder::class,
           MovieSeeder::class
       ]);
    }
}
