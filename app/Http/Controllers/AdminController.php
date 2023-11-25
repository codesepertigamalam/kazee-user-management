<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function adminDashboard()
    {
        $user = User::findOrFail(Auth::id());
        return view('admin.dashboard',compact('user'));
    }
    public function tampilProfile()
    {
        $user = User::findOrFail(Auth::id());
        $profile = Profile::with('user')->where('id_user', Auth::id())->first();
        return view('admin.pageProfile',compact('user','profile'));
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|regex:/^[0-9\+\-\(\)\/\s]*$/|max:20',
            'about' => 'nullable|string',
        ],[
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than :max characters.',
            
            'location.string' => 'The location must be a string.',
            'location.max' => 'The location may not be greater than :max characters.',
            
            'phone.regex' => 'Please enter a valid phone number.',
            'phone.max' => 'The phone number must not exceed 20 characters.',
            
            'about.string' => 'The about field must be a string.',
        ]);

        User::updateOrInsert([
           'id_user' => $request->input('id_user') 
        ],
        [
            'name' => $request->input('name'), 
        ]);

        Profile::updateOrInsert([
           'id_profile' => $request->input('id_profile') 
        ],
        [
            'id_user' => $request->input('id_user'),
            'location' => $request->input('location'),
            'phone' => $request->input('phone'),
            'about' => $request->input('about'),
        ]);

        return back()->with('success','Data updated successfully');

    }
    public function tampilPassword()
    {
        return view('admin.pagePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|different:current_password',
            'new_password_confirmation' => 'required|same:new_password',
        ], [
            'current_password.required' => 'The current password field is required.',
            'new_password.required' => 'The new password field is required.',
            'new_password.string' => 'The new password must be a string.',
            'new_password.min' => 'The new password must be at least :min characters.',
            'new_password.different' => 'The new password must be different from the current password.',
            'new_password_confirmation.required' => 'The confirm new password field is required.',
            'new_password_confirmation.same' => 'The confirm new password must match the new password.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('admin.updatePassword')->with('error', 'Current password is incorrect.');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        return back()->with('success','Data updated successfully');
    }
}