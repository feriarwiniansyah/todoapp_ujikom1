<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
public function index(Request $request) //ini merupakana function index 
{
$query = $request->input('query');

if ($query) {
    $tasks = Task::where('name', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->latest()
        ->get();

    $lists = TaskList::where('name', 'like', "%{$query}%")
        ->orWhereHas('tasks', function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%");
        })
        ->with(['tasks' => function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%");
        }])
        ->get();
} else {
    $tasks = Task::latest()->get();
    $lists = TaskList::with('tasks')->get();
} //baris diatas digunakan untuk memberi query untuk pencarian

$data = [
    'title' => 'Home', 
    'lists' => $lists,
    'tasks' => $tasks,
    'priorities' => Task::PRIORITIES,
    'highPriorityCount' => Task::where('priority', 'high')->count(),
    'mediumPriorityCount' => Task::where('priority', 'medium')->count(),
    'lowPriorityCount' => Task::where('priority', 'low')->count(),
    'uncompletedCount' => Task::where('is_completed', false)->count(),
]; //ini adalah data yang digunakan dan yang akan ditampilkan pada halaman function index

return view('pages.home', $data); //untuk mengarahkan ke halaman dari output pages.home
}

public function about() {
$data = [
    'title' => 'About',
]; //ini adalah data yang akan ditampilkan di halaman function about

return view('pages.about', $data); //untuk mengarahkan ke halaman dari output pages.about
}

public function store(Request $request) {
$request->validate([
    'name' => 'required|max:100',
    'list_id' => 'required',
    'description' => 'nullable|max:100',
    'priority' => 'required|in:high,medium,low'
]); //untuk validasi data yang akan di enrty ke database

Task::create($request->only([
    'name', 
    'list_id', 
    'description', 
    'priority']));//ini untuk memasukkan data ke database
return redirect()->back(); //ini adalah code yang digunakan untuk mengarahkan ke halaman sebelumnya
}

public function complete($id) {
Task::findOrFail($id)->update(['is_completed' => true]); //digunakan untuk mengirimikan update task menjadi selesai
return redirect()->back();
} //digunakan unutk mengubah task menjadi selesai

public function destroy($id) {
Task::findOrFail($id)->delete();
return redirect()->back();
} //ini adalah code yang digunakan untuk menghapus suatu data

public function show($id) {
$task = Task::findOrFail($id);
return view('pages.detail', [
    'title' => 'Details',
    'task' => $task,
    'lists' => TaskList::with('tasks')->get(),
]); //ini adalah code yang digunakan untuk mengarahkan ke halaman detail dan mengarahkan data yang akan ditampilkan
}

public function changeList(Request $request, Task $task)
{
$request->validate(['list_id' => 'required|exists:task_lists,id']); //digunakan unutk validasi ganti list
$task->update(['list_id' => $request->list_id]); //digunakan untuk mengirimkan data yang akan diupdate ke database
return redirect()->back()->with('success', 'List berhasil diperbarui!'); //ini digunakan untuk mengarahkan ke halaman sebelumnya
} //ini digunakan untuk merubah tasklist

public function update(Request $request, Task $task)
{
$request->validate([
    'list_id' => 'required',
    'name' => 'required|max:100',
    'description' => 'max:255',
    'priority' => 'required|in:low,medium,high'
]); //ini digunakan untuk validasi update

$task->update($request->only([
    'list_id', 
    'name', 
    'description', 
    'priority'])); //sedangkan ini digunakan untuk mengirimkan data ke database
return redirect()->back()->with('success', 'Task berhasil diperbarui!'); //ini digunakan untuk mengarahkan ke halaman sebelumnya
}
}
