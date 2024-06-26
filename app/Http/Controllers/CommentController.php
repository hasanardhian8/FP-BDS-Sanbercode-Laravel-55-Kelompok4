<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index()
    {
        $comments = Comment::with('post')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('post_id');
        return view('post.post', ['comments' => $comments]);
    }

    public function create($postId)
    {
        $post = Post::findOrFail($postId);
        $user = Auth::user(); // Retrieve authenticated user

        return view('comment.comment', compact('post', 'user'));
    }

    public function edit($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        return view('comment.edit', compact('comment'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'comment_content' => 'required',
        ]);

        // Create a new comment
        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'comment_content' => $request->comment_content,
        ]);

        // Redirect back or wherever appropriate
        return redirect()->route('post.show', ['postId' => $request->post_id])->with('success', 'Comment submitted successfully!');
    }

    public function update(Request $request, $commentId)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'comment_content' => 'required',
        ]);

        $comment = Comment::findOrFail($commentId);
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::id();
        $comment->comment_content = $request->comment_content;
        $comment->save();

        return redirect()->back()->with('success', 'comment updated successfully');
    }

    public function destroy(int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();
        return redirect()->back()->with('success', 'comment deleted successfully');
    }
}
