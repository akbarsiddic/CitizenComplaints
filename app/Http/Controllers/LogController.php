<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    //index
    public function index()
    {
        $logs = Log::all();
        return view('log', compact('logs'));
    }
}
