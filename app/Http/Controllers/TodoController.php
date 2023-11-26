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
use Carbon\Carbon;

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
        $todo->category_id = $request->category;
        $todo->save();
        
        return Redirect::route('todo.create')->with('status', 'todo-saved');
    }

    public function edit($id)
    {
        $todo = ToDo::find($id);
        $categories= auth()->user()->categories()->get();
        return view('todo.todo-edit', compact('todo','categories'));
    }

    public function update(CategoryRequest $request,$id)
    {
        $todo = ToDo::find($id);
        $category->name = $request->category_name;
        $category->update();

        $categories= auth()->user()->categories()->get();
        return view('category.categories-index')
            ->with('categories', $categories);
    }

    public function delete($id)
    {
        $todo = ToDo::find($id);
        $todo->delete();
        
        $todos= auth()->user()->toDos()->get();
        return view('todo.todo-index')
            ->with('todos', $todos);
    }

    public function done($id)
    {
        $todo = ToDo::find($id);
        $todo->completed_at = Carbon::now();
        $todo->update();

        $todos= auth()->user()->toDos()->get();
        return view('todo.todo-index')
            ->with('todos', $todos);
    }
}
