<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Log;
use barryvdh\dompdf\Facade;
use PDF;

class LogController extends Controller
{
    //index
    public function index()
    {
        $logs = DB::table('logs')
            ->join('categories', 'logs.category_id', '=', 'categories.id')
            ->join('users', 'logs.user_id', '=', 'users.id')
            ->join('complaints', 'logs.complaint_id', '=', 'complaints.id')
            ->select(
                'logs.*',
                'categories.name as category',
                'users.name as name',
                'complaints.description as complaint_description'
            )
            ->orderBy('logs.id', 'desc')
            ->get();

        return view('log', compact('logs'));
    }

    public function exportToPDF()
    {
        $logs = DB::table('logs')
            ->join('categories', 'logs.category_id', '=', 'categories.id')
            ->join('users', 'logs.user_id', '=', 'users.id')
            ->join('complaints', 'logs.complaint_id', '=', 'complaints.id')
            ->select(
                'logs.*',
                'categories.name as category',
                'users.name as name',
                'complaints.description as complaint_description'
            )
            ->orderBy('logs.id', 'desc')
            ->get();

        $pdf = PDF::loadView('log-pdf', compact('logs'));

        return $pdf->download('log.pdf');
    }
}
