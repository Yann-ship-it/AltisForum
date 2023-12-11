<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $comment_id = $request->topic_id;
        $post_id = $request->post_id;
        $user_id = Auth::id();

        return view ('post.create', compact('comment_id', 'user_id', 'post_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'comment_content' => 'required',
        ]);

        Comment::create([
            'comment_content' => $request->comment_content,
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);

         if (!auth()->user()->isAdmin() && Gate::allows('comment-destroy', $comment)) {
             abort(403);
         }

        $comment->delete();

        return redirect()->back()->with('succes', 'Votre commentaire est bien supprimé');
    }
}
