<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
