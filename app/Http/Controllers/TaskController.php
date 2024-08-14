<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    public function index(){
        return view('index', [
            'tasks' => Task::orderBy('date', 'desc')->get(),
            'categories' => Category::all()
        ]);
    }

    public function add(){
        return view('add');
    }

    public function store(Request $request){

        Task::create($request->input());

        return redirect()->route('index');
    }

    public function destroy(Request $request){
        $id = $request->input('button');

        Task::find($id)->delete();

        return redirect()->route('index');
    }

    public function show(Task $task){
        return view('show', ['task' => $task]);
    }

    public function edit(Task $task){
        return view('edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task){
        $task->update($request->input());
        return redirect()->route('index');
    }   
}
