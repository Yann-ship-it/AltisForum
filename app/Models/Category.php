<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory;

    public function topics() {
        return $this->belongsToMany(Topic::class, 'topics_categories', 'category_id', 'topic_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function posts() {
        return $this->belongsTo(Post::class);
    }

    // public function posts() {
    //     return $this->belongsTo(Post::class, 'topics_categoies', 'post_id', 'category_id');
    // }
}
