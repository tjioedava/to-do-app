<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    public function index(Request $request){

        $category_name = $request->input('category');

        if(!$category_name){
            $category_name = 'All';
        }

        if($category_name == 'All'){
            $tasks = Task::all();
        }
        else{
            $category = Category::where('name', $category_name)->first();
            if(!$category){
                abort(404);
            }
            $tasks = Task::where('category', $category->name)->get();
        }

        return view('index', [
            'tasks' => $tasks,
            'categories' => Category::all()
        ]);
    }

    public function add(){
        return view('add', ['categories' => Category::all()]);
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
        return view('edit', [
            'task' => $task,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Task $task){
        $task->update($request->input());
        return redirect()->route('index');
    }   

    public function add_category(){
        return view('add-category');
    }

    public function store_category(Request $request){
        Category::create($request->input());

        return redirect()->route('index');
    }
}
