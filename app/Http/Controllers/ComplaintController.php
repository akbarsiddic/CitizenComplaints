<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    #create
    public function create()
    {
        return view('complaint.create');
    }

    # store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            
        ]);

        Complaint::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'status' => 'pending',
            'user_id' => Auth::id()
        ]);

        return redirect()->route('complaint')
            ->with('success', 'Complaint created successfully.');
    }

    #destroy
    public function destroy($id)
    {
        Complaint::find($id)->delete();

        return redirect()->route('complaint')
            ->with('success', 'Complaint deleted successfully');
    }

    #edit
    public function edit($id)
    {
        $complaint = Complaint::find($id);
        return view('complaint.edit', compact('complaint'));
    }

    #update
public function update(Request $request, $id)
{
    // dd($request->all());
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'status' => 'required'
    ]);

    $complaint = Complaint::find($id);
    $complaint->update($request->except('_token', '_method'));

    return redirect()->route('complaint')
        ->with('success', 'Complaint updated successfully.');
}


}
