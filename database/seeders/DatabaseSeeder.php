<?php

namespace Database\Seeders;
//seeder merupakan data cadangan/data awal untuk percobaan 

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TaskListSeeder::class);
        $this->call(TaskSeeder::class);
    }
}