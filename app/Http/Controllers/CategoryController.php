<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;
use App\Http\Requests\SaveCategoryRequest;

class CategoryController extends Controller
{
    public function add(){
        return view('categories.add');
    }

    public function store(SaveCategoryRequest $request){
        Category::create($request->validated());
        return redirect()->route('index')->with('status', 'Category added successfully');
    }

    public function edit(Request $request){

        if(Category::all()->isEmpty()){
            return redirect()->route('index')->with('status', 'No category to edit');
        }

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

    public function update(SaveCategoryRequest $request){
        $request->validated();

        $category = Category::where('name', $request->input('old-category-name'))->first();
        $new_category_name = $request->input('name');

        Task::where('category', $category->name)->update(['category' => $new_category_name]);
        $category->update(['name' => $new_category_name]);

        return redirect()->route('index')->with('status', 'Category updated successfully');
    }

    public function delete(){
        $categories = Category::all();

        if($categories->isEmpty()){
            return redirect()->route('index')->with('status', 'No category to delete');
        }

        return view('categories.delete', compact('categories'));
    }

    public function destroy(Request $request){
        $category = Category::where('name', $request->input('category'))->first();
        Task::where('category', $category->name)->update(['category' => '']);
        $category->delete();
        return redirect()->route('index')->with('status', 'Category deleted successfully');
    }
}
