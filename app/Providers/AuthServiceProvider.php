<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;
use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('update-topic', function (User $user, Topic $topic) {
            return $user->id === $topic->user_id || $user->role_id === '1';
        });

        Gate::define('topic-destroy', function (User $user, Topic $topic) {
            return $user->id === $topic->user_id || $user->role_id === '1';
        });

        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id || $user->role_id === '1';
        });

        Gate::define('post-destroy', function (User $user, Post $post) {
            return $user->id === $post->user_id || $user->role_id === '1';
        });

        Gate::define('comment-destroy', function (User $user, Comment $comment) {
            return $user->id === $comment->user_id || $user->role_id === '1';
        });

        Gate::define('comment-destroy', function (User $user, Comment $comment) {
            return $user->id === $comment->user_id || $user->role_id === '1';
        });
    }
}
