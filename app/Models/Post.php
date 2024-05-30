<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{

    use HasFactory;

    protected $guarded = [];


// Other model properties and methods

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);

    }

#posts has many likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    protected $appends = ['likes_count'];
    public function isLikedByUser()
    {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    // Other model methods and properties

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }





}
