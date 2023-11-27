<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Animal;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Animal::all();
        $totalPet = Animal::count();
        $totalOwner = Owner::count();
        return view('animal.index', compact('pets', 'totalPet', 'totalOwner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = Owner::all();
        return view('animal.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnimalRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'owner' => 'required',
            'type' => 'required',
            'age' => 'required|numeric',
            'description' => 'required'
        ]);

        $owner = new Animal;
        $owner->name = $validatedData['name'];
        $owner->age = $validatedData['age'];
        $owner->type = $validatedData['type'];
        $owner->description = $validatedData['description'];
        $owner->ownerID = $validatedData['owner'];
        $owner->save();

        return redirect('/animal')->with('success', 'Score added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return view('animal.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnimalRequest $request, Animal $animal)
    {
        $animal->update($request->all());
        return redirect()->route('animal.index')->with('status', 'Test updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return  redirect('/animal');
    }
}
