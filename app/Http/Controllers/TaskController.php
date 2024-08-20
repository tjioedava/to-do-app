<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    public function index(Request $request){

        $category_name = $request->input('category');

        if(!$category_name || $category_name == 'All'){
            $tasks = Task::all();
        }
        else{
            $category = Category::where('name', $category_name)->first();
            if(!$category){
                abort(404);
            }
            $tasks = Task::where('category', $category->name)->get();
        }

        $carousel_pos = $request->input('carousel-pos');
        if(!$carousel_pos){
            $carousel_pos = 0;
        }
        else{
            if(!ctype_digit($carousel_pos)){
                abort(404);
            }
            $carousel_pos = (int)$carousel_pos;

            $categories_count = Category::count();
            if($categories_count <= 2){
                if($carousel_pos != 0){
                    abort(404);
                }
            }
            else{
                if($carousel_pos > $categories_count - 2){
                    abort(404);
                }
            }
        }
        $categories = Category::all();
        return view('index', compact('tasks', 'categories', 'carousel_pos'));
    }

    public function add(){
        $categories = Category::all();
        return view('tasks.add', compact('categories'));
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
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task){
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task){
        $task->update($request->input());
        return redirect()->route('index');
    }   
}
