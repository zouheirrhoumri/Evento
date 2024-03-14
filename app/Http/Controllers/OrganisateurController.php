<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Category;

use function Laravel\Prompts\search;

class OrganisateurController extends Controller
{
    public function organisationDashboard(){
        $categories = Category::all();
        $events = Event::paginate(6);
        return view('organisation.organisationDashboard', compact('events', 'categories'));
    }
    
}
