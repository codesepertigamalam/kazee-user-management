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
}