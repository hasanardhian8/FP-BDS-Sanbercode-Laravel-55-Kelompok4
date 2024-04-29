<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    function show($id)
    {
        $profile = User::findOrFail($id);
        return view('profiles.showProfile', ['profile' => $profile]);
    }

    public function edit($id)
    {
        $profile = User::findOrFail($id);
        return view('profiles.editProfile', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = User::findOrFail($id);
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->update();
        return view('profiles.showProfile', compact('profile'));
    }

    public function destroy($id)
    {
        $profile = User::findOrFail($id);
        $profile->delete();

        // Log out the user
        Auth::logout();

        // Redirect to the login page or any other page as needed
        return redirect()->route('dashboard')->with('success', 'Profile deleted successfully and user logged out.');
    }
}
