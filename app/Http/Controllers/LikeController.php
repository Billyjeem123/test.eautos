<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function toggle(Request $request, Post $post)
    {
        $like = $post->likes()->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
            $message = 'Post unliked successfully';
        } else {
            $post->likes()->create([
                'user_id' => Auth::id(),
            ]);
            $message = 'Post liked successfully';
        }

        $likesCount = $post->likes()->count();

        return response()->json([
            'message' => $message,
            'likes_count' => $likesCount
        ]);
    }


}
