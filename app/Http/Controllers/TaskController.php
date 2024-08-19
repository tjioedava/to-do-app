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

        $carousel_pos = $request->input('carousel-pos');
        if(!$carousel_pos){
            $carousel_pos = 0;
        }
        else{
            if(!ctype_digit($carousel_pos)){
                abort(404);
            }
            $carousel_pos = (int)$carousel_pos;

            $categories_count = count(Category::all());
            if($categories_count <= 3){
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

        return view('index', [
            'tasks' => $tasks,
            'categories' => Category::all(),
            'carousel_pos' => $carousel_pos, 
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

    public function edit_category(Request $request){
        $context = ['categories' => Category::all()];

        $category_name = $request->input('category');

        if(!$category_name){
            return view('edit-category', $context);            
        }
        $category = Category::where('name', $category_name)->first();

        if($category){
           $context['selected_category'] = $category;
        }

        return view('edit-category', $context);
    }

    public function update_category(Request $request){
        $category = Category::where('name', $request->input('old-category-name'))->first();
        $new_category_name = $request->input('name');

        $tasks = Task::where('category', $category->name)->get();
        foreach ($tasks as $task){
            $task->category = $new_category_name;
            $task->save();
        }
        $category->name = $new_category_name;
        $category->save();

        return redirect()->route('index');
    }

    public function store_category(Request $request){
        Category::create($request->input());

        return redirect()->route('index');
    }

    public function delete_category(){
        return view('delete-category', ['categories' => Category::all()]);
    }

    public function destroy_category(Request $request){

        $category = Category::where('name', $request->input('category'))->first();

        $tasks = Task::where('category', $category->name)->get();

        foreach ($tasks as $task){
            $task->category = '';
            $task->save();
        }

        $category->delete();

        return redirect()->route('index');
    }
}
