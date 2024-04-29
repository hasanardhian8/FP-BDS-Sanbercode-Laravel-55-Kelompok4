<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostLike;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    //
    public function likePost($postId)
    {
        $postLike = new PostLike();
        $postLike->user_id = Auth::id();
        $postLike->post_id = $postId;
        $postLike->liked = true; // You can set it to true for like and false for dislike
        $postLike->save();
        return redirect()->back()->with('success', 'like post successfully');
        // return response()->json(['message' => 'Post liked successfully'], 200);
    }

    public function dislikePost($postId)
    {
        $postLike = new PostLike();
        $postLike->user_id = Auth::id();
        $postLike->post_id = $postId;
        $postLike->liked = false; // Dislike
        $postLike->save();
        return redirect()->back()->with('success', 'dislike post successfully');
        //return response()->json(['message' => 'Post disliked successfully'], 200);
    }
}
