<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserColumn;

class UserColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userColumns = UserColumn::where('user_id', auth()->id())->get();
    
        return view('user-columns.index', compact('userColumns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-columns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'column_name' => 'required|string|max:255',
            'column_type' => 'required|string|in:text,number,date',
        ]);
    
        $userColumn = new UserColumn;
        $userColumn->user_id = auth()->id();
        $userColumn->column_name = $request->column_name;
        $userColumn->column_type = $request->column_type;
        $userColumn->save();
    
        return redirect('/user-columns')->with('success', 'Column added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserColumn $userColumn)
    {
        return view('user-columns.edit', compact('userColumn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserColumn $userColumn)
    {
        $request->validate([
            'column_name' => 'required|string|max:255',
            'column_type' => 'required|string|in:text,number,date',
        ]);
    
        $userColumn->column_name = $request->column_name;
        $userColumn->column_type = $request->column_type;
        $userColumn->save();
    
        return redirect('/user-columns')->with('success', 'Column updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserColumn $userColumn)
    {
        $userColumn->delete();
    
        return redirect('/user-columns')->with('success', 'Column deleted successfully!');
    }
}
