<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Complaint;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;
use App\Notifications\ComplaintResolved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ComplaintController extends Controller
{
    # index
    public function index()
    {
        $locations = Location::all();
        # join categories table
        $complaints = DB::table('complaints')
            ->join('categories', 'complaints.category_id', '=', 'categories.id')
            ->select('complaints.*', 'categories.name as category_name')
            ->orderBy('complaints.id', 'desc')
            ->get();

        return view('complaint', compact('complaints', 'locations'));
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
            'location_id' => 'nullable|exists:locations,id',
            'category_id' => 'required',
            'image' => 'image|mimes:png,jpg|max:2048', // add image validation rules
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imagePath = Storage::url($imagePath);
        }

        Complaint::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'location_id' => 1,
            'status' => 'pending',
            'user_id' => Auth::id(),
            'image' => $imagePath, // save image path to the database
        ]);

        return redirect()
            ->route('complaint')
            ->with('success', 'Complaint created successfully.')
            ->with('swal_success', 'Your complaint has been submitted!');
    }

    #destroy
    public function destroy($id)
    {
        Complaint::find($id)->delete();

        return redirect()
            ->route('complaint')
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
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'category_id' => 'required',
        //     'status' => 'required',
        // ]);

        $complaint = Complaint::find($id);
        $complaint->update($request->except('_token', '_method'));

        if ($complaint->status == 'resolved') {
            $user = User::find($complaint->user_id);
            if ($user && $user->email) {
                $user->notify(new ComplaintResolved($complaint));
            }
        }

        return redirect()
            ->route('complaint')
            ->with('success', 'Complaint updated successfully.');
    }
}
