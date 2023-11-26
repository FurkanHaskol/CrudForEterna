<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class CategoryController extends Controller
{
    public function index()
    {
        $categories= auth()->user()->categories()->get();
        return view('categories-index')
            ->with('categories', $categories);
    }

    public function create()
    {
        return view('categories-create');
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
        return view('categories-edit', compact('category'));
    }

    public function update(CategoryRequest $request,$id)
    {
        $category = Category::find($id);
        $category->name = $request->category_name;
        $category->update();

        $categories= auth()->user()->categories()->get();
        return view('categories-index')
            ->with('categories', $categories);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        
        $categories= auth()->user()->categories()->get();
        return view('categories-index')
            ->with('categories', $categories);
    }
}
