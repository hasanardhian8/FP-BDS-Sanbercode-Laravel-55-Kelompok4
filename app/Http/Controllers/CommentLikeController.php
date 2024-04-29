<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentLike;
use Illuminate\Support\Facades\Auth;

class CommentLikeController extends Controller
{
    public function likeComment($commentId)
    {
        //$user = $request->user(); // Retrieve the authenticated user
        $commentLike = new CommentLike();
        $commentLike->user_id = Auth::id();
        $commentLike->comment_id = $commentId;
        $commentLike->liked = true; // Like
        $commentLike->save();
        return redirect()->back()->with('success', 'like comment successfully');
        //return response()->json(['message' => 'Comment liked successfully'], 200);
    }

    public function dislikeComment($commentId)
    {
        //$user = $request->user(); // Retrieve the authenticated user
        $commentLike = new CommentLike();
        $commentLike->user_id = Auth::id();
        $commentLike->comment_id = $commentId;
        $commentLike->liked = false; // Dislike
        $commentLike->save();
        return redirect()->back()->with('success', 'dislike comment successfully');
        // return response()->json(['message' => 'Comment disliked successfully'], 200);
    }
}
