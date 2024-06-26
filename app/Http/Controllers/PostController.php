<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{

  public function index()
  {
    // Retrieve posts without a group, ordered by creation date
    $posts = Post::with('group')
      ->whereNull('group_id')
      ->orderBy('created_at', 'desc')
      ->get();

    return view('post.post', compact('posts'));
  }

  public function show($postId)
  {
    $post = Post::findOrFail($postId);

    $comments = Comment::with(['post', 'user'])
      ->where('post_id', $postId)
      ->orderBy('created_at', 'asc')
      ->get(); // Group comments by post_id

    return view('post.showPost', compact('post', 'comments'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'post_content' => 'required|string|max:255', // Adjust validation rules as needed
    ]);

    $post = new Post();
    $post->user_id = Auth::id();
    $post->post_content = $request->post_content;
    $post->save();

    return redirect()->back()->with('success', 'Post created successfully');
  }

  public function edit($postId)
  {
    $post = Post::findOrFail($postId);
    return view('post.editPost', compact('post'));
  }

  public function update(Request $request, $postId)
  {
    $validatedData = $request->validate([
      'post_content' => 'required|string', // Adjust validation rules as needed
    ]);

    $post = Post::findOrFail($postId);
    $post->post_content = $request->post_content;
    $post->save();

    return redirect()->back()->with('success', 'Post updated successfully');
  }

  public function destroy($postId)
  {
    $post = Post::findOrFail($postId);
    $post->delete();
    return redirect()->back()->with('success', 'Post deleted successfully');
  }
}
