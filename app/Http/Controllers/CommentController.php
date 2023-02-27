<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    #get
    public function index($id)
    {
        $comment = Comment::where('complaint_id', $id)->get();
        return view('comment', compact('comment', 'id'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'complaint_id' => $id,
        ]);

        return redirect()
            ->route('comment', $id)
            ->with('success', 'Comment created successfully.');
    }
}
