<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    #index
    public function create()
    {
        $locations = Location::all();

        return view('complaints.create', compact('locations'));
    }
}
