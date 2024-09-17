<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\models\User;
class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string',
            'bio' => 'nullable|string',
            'phone' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::delete('public/profile_pictures/' . $user->profile_picture);
            }

            // Store the new profile picture
            $profilePicture = $request->file('profile_picture');
            $profilePictureName = time() . '.' . $profilePicture->getClientOriginalExtension();
            $profilePicture->storeAs('public/profile_pictures', $profilePictureName);

            // Update the user's profile picture in the database
            $user->profile_picture = $profilePictureName;
        }

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->address = $request->input('address');
        $user->birthday = $request->input('birthday');
        $user->gender = $request->input('gender');
        $user->bio = $request->input('bio');
        $user->phone = $request->input('phone');
        
        $user->save();
    
        return redirect()->route('profile.update')->with('success', 'User information updated successfully.');
    }

    public function UpdateSalaryAndDepartment(Request $request, $id){
        $request->validate([
            'department' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($id);

        $user->department = $request->input('department');
        $user->salary = $request->input('salary');
   
        $user->save();

        return redirect()->route('employees', $user->id)->with('success', 'User information updated successfully.');
    }

}
