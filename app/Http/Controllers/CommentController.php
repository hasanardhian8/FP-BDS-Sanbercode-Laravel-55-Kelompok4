<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index()
    {
        $comments = Comment::with('post')->orderBy('created_at', 'desc')->get();
        return view('comment.list', ['comments' => $comments]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'comment_content' => 'required',
            'post_id' => 'required',
        ]);

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to login first.');
        }

        $comment = new Comment;
        $comment->user_id = auth()->id();
        $comment->post_id = $request->post_id;
        $comment->comment_content = $request->comment_content;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }
    public function destroy(int $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
    }
}
