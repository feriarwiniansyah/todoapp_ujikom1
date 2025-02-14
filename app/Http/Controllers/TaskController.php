<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
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
        }

        $data = [
            'title' => 'Home', 
            'lists' => $lists,
            'tasks' => $tasks,
            'priorities' => Task::PRIORITIES,
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
        ]);

        Task::create($request->only(['name', 'list_id', 'description', 'priority']));
        return redirect()->back();
    }

    public function complete($id) {
        Task::findOrFail($id)->update(['is_completed' => true]);
        return redirect()->back();
    }

    public function destroy($id) {
        Task::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function show($id) {
        $task = Task::findOrFail($id);
        return view('pages.detail', [
            'title' => 'Details',
            'task' => $task,
            'lists' => TaskList::with('tasks')->get(),
        ]);
    }

    public function changeList(Request $request, Task $task)
    {
        $request->validate(['list_id' => 'required|exists:task_lists,id']);
        $task->update(['list_id' => $request->list_id]);
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
        
        $task->update($request->only(['list_id', 'name', 'description', 'priority']));
        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}
