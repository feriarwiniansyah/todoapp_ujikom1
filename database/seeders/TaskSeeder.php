<?php

namespace Database\Seeders;
//seeder merupakan data cadangan/data awal untuk percobaan

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [ //syntax ini digunakan untuk menambahkan Healing kedalam colom name di table task
            [
                'name' => 'Belajar Laravel',
                'description' => 'Belajar Laravel di santri koding',
                'is_completed' => false,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ], // syntax ini digunakan untuk menambahkan data data diatas kedalam colom colom yang tersedia di table task
            [
                'name' => 'Belajar React',
                'description' => 'Belajar React di WPU',
                'is_completed' => true,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Belajar')->first()->id,
            ],
            [
                'name' => 'Pantai',
                'description' => 'Liburan ke Pantai bersama keluarga',
                'is_completed' => false,
                'priority' => 'low',
                'list_id' => TaskList::where('name', 'Healing')->first()->id,
            ],
            [
                'name' => 'Villa',
                'description' => 'Liburan ke Villa bersama teman sekolah',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Healing')->first()->id,
            ],
            [
                'name' => 'Matematika',
                'description' => 'Tugas Matematika bu Nina',
                'is_completed' => true,
                'priority' => 'medium',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'PAIBP',
                'description' => 'Tugas presentasi pa budi',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'Project Ujikom',
                'description' => 'Membuat project Todo App untuk ujikom',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Tugas')->first()->id,
            ],
            [
                'name' => 'Lulus',
                'description' => 'Lulus Segala-galanya',
                'is_completed' => false,
                'priority' => 'high',
                'list_id' => TaskList::where('name', 'Wishlist')->first()->id,
            ],
        ];

        Task::insert($tasks); 
    }
}