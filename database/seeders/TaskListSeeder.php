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
        $lists /*lists digunakan untuk judul*/ = [
            [
                'name' => 'Liburan',
            ],
            [
                'name' => 'Belajar',
            ],
            [
                'name' => 'Tugas',
            ]
        ];

        TaskList::insert($lists);
    }
} 