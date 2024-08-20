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

        //create an appropriate category based on validated request
        Category::create($request->validated());

        return redirect()->route('index')->with('status', 'Category added successfully');
    }

    public function edit(Request $request){

        //redirect to home/index page if no category exists
        if(Category::all()->isEmpty()){
            return redirect()->route('index')->with('status', 'No category to edit');
        }

        $context = ['categories' => Category::all()];
        $category_name = $request->input('category');

        //if the category query exists, examine the value
        //if the query doesn't exist or the value is equivalent to null, render the edit view without category context
        if($category_name !== null){

            //add category to context if the value is valid
            $category = Category::where('name', $category_name)->first();
            if($category){
                $context['selected_category'] = $category;
            }  
            else{
                //fail if the value is invalid
                abort(404);
            }
        }
        return view('categories.edit', $context);    
    }

    public function update(SaveCategoryRequest $request){
        $request->validated();

        $category = Category::where('name', $request->input('old-category-name'))->first();
        $new_category_name = $request->input('name');

        //change the category name for all the task that has corresponding category
        Task::where('category', $category->name)->update(['category' => $new_category_name]);

        //change the category name with the new name
        $category->update(['name' => $new_category_name]);

        return redirect()->route('index')->with('status', 'Category updated successfully');
    }

    public function delete(){
        $categories = Category::all();

        //redirect to home/index if no category exists to be deleted
        if($categories->isEmpty()){
            return redirect()->route('index')->with('status', 'No category to delete');
        }

        return view('categories.delete', compact('categories'));
    }

    public function destroy(Request $request){
        $category = Category::where('name', $request->input('category'))->first();

        //making the category of associated task null or empty
        Task::where('category', $category->name)->update(['category' => '']);

        $category->delete();
        return redirect()->route('index')->with('status', 'Category deleted successfully');
    }
}
