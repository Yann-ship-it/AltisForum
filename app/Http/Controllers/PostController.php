<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Topic;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $topic_id = $request->topic_id;
        $category = DB::table('topics_categories')->where('topic_id', '=', $request->topic_id)->get();
        $user_id = Auth::id();

        $category_id = $category{0}->category_id;
        
        return view ('post.create', compact('category_id', 'user_id', 'topic_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'post_name' => 'required',
            'post_content' => 'required',
        ]);

        Post::create([
            'post_name' => $request->post_name,
            'post_content' => $request->post_content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'topic_id' => $request->topic_id,
        ]);

        return redirect()->route('forum.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user_id = Auth::id();
        $topic = Topic::find($id);
        $posts = Post::with('comment', 'user')->find($id);        

        return view ('post.show', compact('topic', 'posts', 'user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);

         if (auth()->user()->isAdmin() && Gate::allows('update-post', $post)) {
             abort(403);
         }

        return view ('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'post_name' => 'required',
            'post_content' => 'required',
        ]);   

        $post = Post::findOrFail($id);

        $post->update ([
            'post_name' => $request->post_name,
            'post_content' => $request->post_content,
        ]);

        return redirect()->route('dashboard')->with('succes', 'Votre post est bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

         if (auth()->user()->isAdmin() && Gate::allows('post-destroy', $post)) {
             abort(403);
         }

        $post->delete();

        return redirect()->route('dashboard')->with('succes', 'Votre post est bien supprimé');
    }
}
