<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    protected $with = ['comment'];

    protected $fillable = [
        'post_name',
        'post_content',
        'category_id',
        'user_id',
        'topic_id',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic() 
    {
        return $this->belongsTo(Topic::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    } 

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function categories() {
    //     return $this->belongsToMany(Category::class, 'topics_categories', 'category_id', 'topic_id');
    // }

    public function timeElapsed() {
        $now = Carbon::now();
        $commentDate = Carbon::parse($this->created_at);
        return $commentDate->diffForHumans($now);
    }


}
