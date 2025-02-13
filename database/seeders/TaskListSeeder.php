<?php

namespace Database\Seeders;
//seeder merupakan data cadangan/data awal untuk percobaan

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TaskList;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lists /*lists adalah variabel digunakan untuk judul*/ = [
            [
                'name' => 'Healing', //syntax ini digunakan untuk menambahkan Healing kedalam colom name di table tasklist
            ],
            [
                'name' => 'Belajar', 
            ],
            [
                'name' => 'Tugas',
            ],
            [
                'name' => 'Wishlist',
            ],
            [
                'name' => 'Wishlist1'
            ],
            [
                'name' => 'Wishlist2'
            ],
            [
                'name' => 'Wishlist3'
            ],
        ];

        TaskList::insert($lists); //codingan untuk menambahkan data kedalam database
    }
} 