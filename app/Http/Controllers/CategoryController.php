<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ProfileUpdateRequest;
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

    public function add(Request $request)
    {
        $catergory = new Category();
        $catergory->name = $request->category_name;
        $catergory->user_id = auth()->id();
        $catergory->save();
        
        return Redirect::route('categories.create')->with('status', 'category-saved');
    }
}
