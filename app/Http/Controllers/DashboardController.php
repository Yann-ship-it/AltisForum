<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        
        $topics = $user->topics; 
        $posts = Post::all();
        $comments = Comment::all();

        return view('dashboard', compact('topics', 'posts', 'user', 'comments'));
    }
}
