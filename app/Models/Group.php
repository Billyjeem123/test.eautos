<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function group_members()
    {
        return $this->belongsToMany(User::class, 'group_user', 'group_id', 'user_id');
    }


    public function posts()
    {
        return $this->hasMany(Post::class); // Adjust this according to your actual relationships
    }

    // Accessor for members_count
    public function getMembersCountAttribute()
    {
        return $this->group_members()->count();
    }

    // Accessor for posts_today
    public function getPostsTodayAttribute()
    {
        return $this->posts()->whereDate('created_at', now()->toDateString())->count();
    }
}
