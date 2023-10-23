<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

 /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'nullable',
            'address' => 'nullable',
            'postal_code' => 'nullable',
            'city' => 'nullable',
            'website' => 'nullable',
            'phone' => 'nullable',
            'tax_number' => 'nullable',
        ]);
    
        $user = Auth::user();
        $user->company = $validatedData['company'] ?? null;
        $user->address = $validatedData['address'] ?? null;
        $user->postal_code = $validatedData['postal_code'] ?? null;
        $user->city = $validatedData['city'] ?? null;
        $user->website = $validatedData['website'] ?? null;
        $user->phone = $validatedData['phone'] ?? null;
        $user->tax_number = $validatedData['tax_number'] ?? null;
        $user->save();
    
        $successMessage = __('messages.profile_updated_successfully');
        return redirect()->back()->with('success', $successMessage);
    }
    
}

