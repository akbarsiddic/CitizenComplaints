<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ComplaintController extends Controller
{
    # index
    public function index()
    {
        # join categories table
        $complaints = DB::table('complaints')
            ->join('categories', 'complaints.category_id', '=', 'categories.id')
            ->select('complaints.*', 'categories.name as category_name')
            ->get();
        


        return view('complaint', compact('complaints'));
    }
}
