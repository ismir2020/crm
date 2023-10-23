<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Lead;

class LeadController extends Controller
{
    public function showAllLeads() 
    {
        $user = Auth::user(); // Get the authenticated user
        $leads = Lead::all();
        return view('leads', compact('leads', 'user'));
    }
}