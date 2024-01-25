<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Topic;
use App\Models\Category;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $with = [
        'role',
    ];

    protected $fillable = [
        'pseudo',
        'role_id',
        'avatar',
        'email',
        'password',
        'online',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function comments() {
        return $this->hasMany(Category::class);
    }

    public function topics() {
        return $this->hasMany(Topic::class);
    }

    public function categories() {
        return $this->hasMany(Category::class);   
    }

    public function bans()
    {
        return $this->hasMany(Ban::class);
    }

    public function isAdmin()
    {
        return $this->role_id === '1';
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }
}