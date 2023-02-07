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
}
