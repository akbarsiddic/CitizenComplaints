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
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

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
            ->where(function ($query) use ($search, $status) {
                $query
                    ->where(function ($query) use ($search) {
                        $query
                            ->where('categories.name', 'like', "%$search%")
                            ->orWhere('users.name', 'like', "%$search%")
                            ->orWhere('logs.title', 'like', "%$search%")
                            ->orWhere('logs.created_at', 'like', "%$search%");
                    })
                    ->when($status, function ($query, $status) {
                        return $query->where('logs.status', $status);
                    });
            })
            ->orderBy('logs.id', 'desc')
            ->get();

        return view('log', compact('logs'));
    }

    public function exportToPDF(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

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
            ->where(function ($query) use ($search, $status) {
                $query
                    ->where(function ($query) use ($search) {
                        $query
                            ->where('categories.name', 'like', "%$search%")
                            ->orWhere('users.name', 'like', "%$search%")
                            ->orWhere('logs.title', 'like', "%$search%")
                            ->orWhere('logs.created_at', 'like', "%$search%");
                    })
                    ->when($status, function ($query, $status) {
                        return $query->where('logs.status', $status);
                    });
            })
            ->orderBy('logs.id', 'desc')
            ->get();

        $pdf = PDF::loadView('log-pdf', compact('logs'));

        return $pdf->download('log.pdf');
    }
}
