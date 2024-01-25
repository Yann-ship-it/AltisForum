<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        
        $allComments = DB::table('comments')->count();
        $allTopics = DB::table('topics')->count();
        $allUsers = DB::table('users')->count();

        return view('home', compact('allComments', 'allTopics', 'allUsers'));
    }
}
