<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJugeRequest;
use App\Http\Requests\UpdateJugeRequest;
use App\Models\Juge;

class JugeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $juges = Juge::withCount('tests')->get();
        $totalJuge = Juge::count();
        return view('juge.index', compact('juges', 'totalJuge'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('juge.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJugeRequest $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'expertise' => 'required',
        ]);

        $juge = new Juge;
        $juge->firstName = $validatedData['firstName'];
        $juge->lastName = $validatedData['lastName'];
        $juge->email = $validatedData['email'];
        $juge->expertise = $validatedData['expertise'];
        $juge->save();

        return redirect('/juge')->with('success', 'Score added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Juge $juge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Juge $juge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJugeRequest $request, Juge $juge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Juge $juge)
    {
        //
    }
}
