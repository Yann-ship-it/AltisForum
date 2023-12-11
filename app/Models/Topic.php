<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{

    protected $fillable = [
        'topic_name',
        'topic_content',
        'category_id',
        'user_id',
    ];

    use HasFactory;

    public function categories() {
        return $this->belongsToMany(Category::class, 'topics_categories', 'category_id', 'topic_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function timeElapsed() {
        $now = Carbon::now();
        $commentDate = Carbon::parse($this->created_at);
        return $commentDate->diffForHumans($now);
    }

}
