<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Post;

class GroupController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $groups = Group::orderBy('created_at', 'desc')->get();
        return view('group.group', compact('user', 'groups'));
    }


    public function show($groupId)
    {
        $group = Group::findOrFail($groupId);
        $posts = Post::with('group')
            ->where('group_id', $groupId)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('group.showGroup', compact('group', 'posts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_content' => 'required|string|max:255', // Adjust validation rules as needed
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->group_id = $request->group_id;
        $post->post_content = $request->post_content;
        $post->save();

        return redirect()->route('group.show', ['groupId' => $request->group_id])->with('success', 'Post created successfully');
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'group_name' => 'required|string|max:255', // Adjust validation rules as needed
            'description' => 'required|string|max:255', // Adjust validation rules as needed
        ]);

        $group = new Group();
        $group->user_id = Auth::id();
        $group->group_name = $request->group_name;
        $group->description = $request->description;
        $group->save();

        return redirect()->route('group.show')->with('success', 'Group created successfully');
    }

    public function edit($groupId)
    {
        $group = Group::findOrFail($groupId);
        return view('group.editGroup', compact('post'));
    }

    public function update(Request $request, $groupId)
    {
        $validatedData = $request->validate([
            'post_content' => 'required|string', // Adjust validation rules as needed
        ]);

        $group = Group::findOrFail($groupId);
        $group->group_name = $request->group_name;
        $group->description = $request->description;
        $group->save();

        return redirect()->route('group.show')->with('success', 'Post updated successfully');
    }

    public function destroy($groupId)
    {
        $group = Group::findOrFail($groupId);
        $group->delete();
        return redirect()->route('group.list')->with('success', 'Post deleted successfully');
    }
}
