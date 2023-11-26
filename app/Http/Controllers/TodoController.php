<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos= auth()->user()->toDos()->get();
        return view('todo.todo-index')
            ->with('todos', $todos);
    }

    public function create()
    {
        return view('todo.todo-create');
    }

    public function add(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->category_name;
        $category->user_id = auth()->id();
        $category->save();
        
        return Redirect::route('categories.create')->with('status', 'category-saved');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.categories-edit', compact('category'));
    }

    public function update(CategoryRequest $request,$id)
    {
        $category = Category::find($id);
        $category->name = $request->category_name;
        $category->update();

        $categories= auth()->user()->categories()->get();
        return view('category.categories-index')
            ->with('categories', $categories);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        
        $categories= auth()->user()->categories()->get();
        return view('category.categories-index')
            ->with('categories', $categories);
    }
}
