<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    public function organisationDashboard(){
        $categories = Category::all();
        $events = Event::all();
        return view('organisation.organisationDashboard', compact('events', 'categories'));
    }
    
}
