<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::with('topics')->get();

        $posts = Post::with('category')->get();

        return view ('forum.index', compact('categories', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category_id = $request->category_id;
        $user_id = Auth::id();

        return view ('forum.create', compact('category_id', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'topic_name' => 'required',
            'topic_content' => 'required',
        ]);

        $topic = Topic::create([
             'topic_name' => $request->topic_name,
             'topic_content' => $request->topic_content,
             'category_id' => $request->category_id,
             'user_id' => $request->user_id,
         ]);

         DB::table('topics_categories')->insert([
            "topic_id" => $topic->id,
            "category_id" => $request->category_id,
        ]);

         return redirect()->route('forum.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Category::with('topics.user')->get();

        $topics = Topic::with('posts')->find($id);

        return view ('forum.show', compact('topics', 'categories' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $topic = Topic::findOrFail($id);

         if (auth()->user()->isAdmin() && Gate::allows('update-topic', $topic)) {
             abort(403);
         }

        return view ('forum.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'topic_name' => 'required',
            'topic_content' => 'required',
        ]);

        $topic = Topic::findOrFail($id);

        $topic->update ([
            'topic_name' => $request->topic_name,
            'topic_content' => $request->topic_content,
        ]);

        return redirect()->route('dashboard')->with('succes', 'Votre post est bien modifié');
    }
   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $topic = Topic::findOrFail($id);

         if (auth()->user()->isAdmin() && Gate::allows('topic-destroy', $topic)) {
             abort(403);
         }

        $topic->delete();

        return redirect()->route('dashboard')->with('succes', 'Votre topic est bien supprimé');
    }
}
