<?php

namespace App\Http\Controllers;

use App\Models\Task; //digunakan untuk mengambil data dari folder yang tertera
use App\Models\TaskList; //digunakan untuk mengambil data dari folder yang tertera
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request) /* digunakan unutk view */
        /* digunakan untuk mengambil task dan tasklist dari model*/
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
                    ->with('tasks')
                    ->get();
    
    
                if ($tasks->isEmpty()) {
                    $lists->load('tasks');
                } else {
                    $lists->load(['tasks' => function ($q) use ($query) {
                        $q->where('name', 'like', "%{$query}%")
                            ->orWhere('description', 'like', "%{$query}%");
                    }]);
                }
            } else {
                $tasks = Task::latest()->get();
                $lists = TaskList::with('tasks')->get();
            }
            
        $data = [
            'title' => 'Home', 
            'lists' => TaskList::all(),
            'tasks' => Task::orderBy('created_at', 'desc')->get(), //digunakan untuk mengurutkan dari terbesar ke terkecil
            'priorities' => Task::PRIORITIES ,//untuk mnegambil nilai priorities dari const yang ada di app\models\task
            'highPriorityCount' => Task::where('priority', 'high')->count(),
            'mediumPriorityCount' => Task::where('priority', 'medium')->count(),
            'lowPriorityCount' => Task::where('priority', 'low')->count(),
            'uncompletedCount' => Task::where('is_completed', false)->count(),
        ];
        


        return view('pages.home', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:100',
            'list_id' => 'required',
            'description' => 'nullable|max:100',
            'priority' => 'required|in:high,medium,low'
        ]); //digunakan untuk request validasi feild name|max:100 diartikan maximal huruf yang harus diinput dan list_id reuired berarti harus diisi

        Task::create([
            'name' => $request->name,
            'list_id' => $request->list_id,
            'description' => $request->description,
            'priority' => $request->priority
        ]);


        return redirect()->back();
    }

    public function complete($id) {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }

    public function destroy($id) {
        Task::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function show($id){$task = Task::FindOrFail($id); //FindOrFail( untuk memilih data dari database dan data yang dipilih adalah yang di taro di dalam kurung

        $data = [
            'title' => 'Details',
            'task' => $task,
            'lists' => TaskList::all(),
            
        ];

        return view('pages.detail', $data);
    }

    public function changeList(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required|exists:task_lists,id',
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id
        ]);

        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'max:255',
            'priority' => 'required|in:low,medium,high'
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}    