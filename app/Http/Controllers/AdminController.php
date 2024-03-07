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
        return view('admin.adminDashboard' , compact('userCount', 'organizationCount', 'eventCount', 'categoryCount'));
    }
}
