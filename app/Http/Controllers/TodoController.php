<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
        $categories= auth()->user()->categories()->get();

        return view('todo.todo-create')->with('categories', $categories);
    }

    public function add(TodoRequest $request)
    {
        $todo = new ToDo();
        $todo->title = $request->todo_title;
        $todo->description = $request->todo_description;
        $todo->priority = $request->priority;
        $todo->due_at = $request->due_date;
        $todo->user_id = auth()->id();
        $todo->save();
        
        return Redirect::route('todo.create')->with('status', 'todo-saved');
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
