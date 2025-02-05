<?php

namespace App\Http\Controllers;

use App\Models\Task; //digunakan untuk mengambil data dari folder yang tertera
use App\Models\TaskList; //digunakan untuk mengambil data dari folder yang tertera
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() /* digunakan unutk view */ {
        /* digunakan untuk mengambil task dan tasklist dari model*/
        $data = [
            'title' => 'Home', 
            'lists' => TaskList::all(),
            'tasks' => Task::orderBy('created_at', 'desc')->get(), //digunakan untuk mengurutkan dari terbesar ke terkecil
            'priorities' => Task::PRIORITIES //untuk mnegambil nilai priorities dari const yang ada di app\models\task
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
}