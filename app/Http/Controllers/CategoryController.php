<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    #get all from categories
    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    #create
    public function create()
    {
        return view('categories.create');
    }

    #store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('category')
            ->with('success', 'Category created successfully.')
            ->with('swal_success', 'Category created successfully.');
    }
}
