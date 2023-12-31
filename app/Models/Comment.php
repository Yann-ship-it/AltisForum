<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_content',
        'post_id',
        'user_id',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function timeElapsed() {
        $now = Carbon::now();
        $commentDate = Carbon::parse($this->created_at);
        return $commentDate->diffForHumans($now);
    }
}

