<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Http\Requests\SaveTaskRequest;

class TaskController extends Controller
{
    public function index(Request $request){

        $category_name = $request->input('category');

        //assume category is all when no query or the value is equivalent to null
        if(!$category_name){
            $category_name = 'All';
        }

        if(strtolower($category_name) == 'all'){
            $tasks = Task::all();
        }
        else{
            $category = Category::where('name', $category_name)->first();
            //if there exists no category that matches the query value: fail
            if(!$category){
                abort(404);
            }
            $tasks = Task::where('category', $category->name)->get();
        }

        //validate the carousel position query. fail if the query value is non numerical or out of range
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

        /*category_name will be passed for parameterizing carousel component
        so that corresponding item / button will be selected*/
        $category_name = ucfirst($category_name);
        
        return view('index', compact('tasks', 'categories', 'carousel_pos', 'category_name'));
    }

    public function add(){
        $categories = Category::all();
        return view('tasks.add', compact('categories'));
    }

    public function store(SaveTaskRequest $request){
        Task::create($request->validated());
        return redirect()->route('index')->with('status', 'Task added successfully');
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

    public function update(SaveTaskRequest $request, Task $task){
        $task->update($request->validated());
        return redirect()->route('index')->with('status', 'Task updated successfully');
    }   
}
