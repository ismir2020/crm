<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use Illuminate\Http\Request;


class LeadController extends Controller
{
    public function showAllLeads() 
    {
        $user = Auth::user(); 
        $leads = Lead::all();
        return view('leads', compact('leads', 'user'));
    }
    public function create()
{
    return view('leads.create');
}
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'nullable|email',
        'phone' => 'nullable',
    ]);

    $lead = new Lead();
    $lead->name = $request->name;
    $lead->email = $request->email;
    $lead->phone = $request->phone;
    $lead->user_id = Auth::user()->id; // Set the user_id here

    $lead->save();

    return redirect()->route('leads.all');
}
}