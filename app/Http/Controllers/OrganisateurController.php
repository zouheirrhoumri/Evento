<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    public function organisationDashboard(){
        return view('organisation.organisationDashboard');
    }
    
}
