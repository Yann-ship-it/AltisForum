<?php

namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Topic;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $allComments = DB::table('comments')->count();
        $allTopics = DB::table('topics')->count();
        $allUsers = DB::table('users')->count();

        $comments = Comment::all();
        // $user = Auth::id();
        
        $topics = Topic::all();
        $posts = Post::all();

        $user = User::all();


        $roles = Role::get();

        return view('admin.adminboard', compact(
        'users', 
        'topics', 
        'posts', 
        'user', 
        'comments', 
        'allUsers', 
        'allTopics', 
        'allComments', 
        'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }

}
 