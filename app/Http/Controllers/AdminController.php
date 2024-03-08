<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $userCount = User::count();
        $organizationCount = User::where('role', 'organisateur')->count();
        $eventCount = Event::count();
        $categoryCount = Category::count();
        return view('admin.adminDashboard', compact('userCount', 'organizationCount', 'eventCount', 'categoryCount'));
    }
    public function userTable()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.userTable', compact('users'));
    }

    public function blockUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 'blocked';
        $user->save();

        return redirect()->back()->with('success', 'User blocked successfully');
    }

    public function unblockUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 'active';
        $user->save();

        return redirect()->back()->with('success', 'User unblocked successfully');
    }
}
