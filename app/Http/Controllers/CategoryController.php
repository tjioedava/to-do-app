<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;

class CategoryController extends Controller
{
    public function add(){
        return view('categories.add');
    }

    public function store(Request $request){
        Category::create($request->input());
        return redirect()->route('index');
    }

    public function edit(Request $request){
        $context = ['categories' => Category::all()];
        $category_name = $request->input('category');
        if($category_name !== null){
            $category = Category::where('name', $category_name)->first();
            if($category){
                $context['selected_category'] = $category;
            }  
            else{
                abort(404);
            }
        }
        return view('categories.edit', $context);    
    }

    public function update(Request $request){
        $category = Category::where('name', $request->input('old-category-name'))->first();
        $new_category_name = $request->input('name');

        Task::where('category', $category->name)->update(['category' => $new_category_name]);
        $category->update(['name' => $new_category_name]);

        return redirect()->route('index');
    }

    public function delete(){
        $categories = Category::all();
        return view('categories.delete', compact('categories'));
    }

    public function destroy(Request $request){
        $category = Category::where('name', $request->input('category'))->first();
        Task::where('category', $category->name)->update(['category' => '']);
        $category->delete();
        return redirect()->route('index');
    }
}
