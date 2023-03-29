<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\Owner;
use App\Models\Animal;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::withCount('animals')->get();
        $totalOwner = Owner::count();
        return view('owner.index', compact('owners', 'totalOwner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOwnerRequest $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required|numeric',
        ]);

        $owner = new Owner;
        $owner->firstName = $validatedData['firstName'];
        $owner->lastName = $validatedData['lastName'];
        $owner->email = $validatedData['email'];
        $owner->phoneNumber = $validatedData['phoneNumber'];
        $owner->save();

        return redirect('/owner')->with('success', 'Score added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        return view('owner.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        $owner->update($request->all());
        return redirect()->route('owner.index')->with('status', 'Test updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owner.index')->with('status', 'Test deleted successfully.');
    }
}
