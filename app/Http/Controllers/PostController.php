<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

  public function index()
  {
    // $user = Auth::user();
    // $posts = $user->posts;
    $posts = Post::orderBy('created_at', 'desc')->get();
    // dd($posts); // Debugging statement
    return view('post.post', ['post' => $posts]);
  }

  public function show($postId)
  {
    $post = Post::findOrFail($postId);
    return view('post.showPost', ['post' => $post]);
  }

  // public function create()
  // {
  //   return view('post.post');
  // }

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

    return redirect()->route('post.index')->with('success', 'Post updated successfully');
  }

  public function destroy($postId)
  {
    $post = Post::findOrFail($postId);
    $post->delete();
    return redirect()->route('post.index')->with('success', 'Post deleted successfully');
  }
}
