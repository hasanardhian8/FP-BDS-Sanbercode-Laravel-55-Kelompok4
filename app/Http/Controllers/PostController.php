<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{

  public function index()
  {
    // Assuming you want to display the authenticated user's post
    $user = Auth::user();
    $post = $user->post; // Assuming you have defined the relationship between User and Post model
    return view('post.post', ['post' => $post]);
  }

  public function show($postId)
  {
    $post = Post::findOrFail($postId);
    return view('post.show', ['post' => $post]);
  }

  public function create()
  {
    return view('post.create');
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

    return redirect()->route('post.index')->with('success', 'Post created successfully');
  }

  public function edit($postId)
  {
    $post = Post::findOrFail($postId);
    return view('post.edit', ['post' => $post]);
  }

  public function update(Request $request, $postId)
  {
    $validatedData = $request->validate([
      'post_content' => 'required|string', // Adjust validation rules as needed
    ]);

    $post = Post::findOrFail($postId);
    $post->post_content = $request->post_content;
    $post->save();

    return redirect()->route('post.index')->with('success', 'Post updated successfully');
  }

  public function destroy($postId)
  {
    $post = Post::findOrFail($postId);
    $post->delete();
    return redirect()->route('post.index')->with('success', 'Post deleted successfully');
  }
}
