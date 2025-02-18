<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:100'
        ]); //digunakan untuk request validasi feild name|max:100 diartikan maximal huruf yang harus diinput

        TaskList::create([
            'name' => $request->name
        ]);

        return redirect()->back(); //digunakan untuk mengarahkan ke halaman sebelumnya
    }

    public function destroy($id) {
        TaskList::findOrFail($id)->delete(); //digunakan untuk menghapus data

        return redirect()->back()->with('success', 'TaskList Berhasil ditambahkan'); //digunakan untuk mengarahkan ke halaman sebelumnya
    }
}