<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead; 
use DataTables;
use App\Http\Controllers\Auth;

class LeadController extends Controller
{
    public function showAllLeads()
    {
        $user = Auth::user();
        $leads = Lead::all();
        $customColumns = UserColumn::forUser($user)->get(); // Fetch custom columns associated with the leads
        return view('leads', compact('leads', 'user', 'customColumns'));
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

    public function index()
    {
        if (\request()->ajax()) {
            $data = Lead::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('leads.index');
    }
}