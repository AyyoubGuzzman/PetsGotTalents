<?php

namespace App\Http\Controllers;

use App\Models\Juge;
use App\Models\Test;
use App\Models\Animal;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Test::orderBy('score', 'desc')->get();
        $totalTest = Test::count();
        return view('test.index', compact('tests', 'totalTest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animals = Animal::all();
        $juges = Juge::all();

        return view('test.create', compact('animals', 'juges'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestRequest $request)
    {
        $validatedData = $request->validate([
            'pet' => 'required',
            'juge' => 'required',
            'score' => 'required|numeric|between:0,100',
        ]);

        // Create a new score record
        $score = new Test;
        $score->jugeID = $validatedData['juge'];
        $score->animalID = $validatedData['pet'];
        $score->score = $validatedData['score'];
        $score->save();

        return redirect('/test')->with('success', 'Score added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        $animals = Animal::all();
        $juges = Juge::all();

        return view('test.edit', compact('animals', 'juges', 'test'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        $test->update($request->all());
        return redirect()->route('test.index')->with('status', 'Test updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return redirect()->route('test.index')->with('status', 'Test deleted successfully.');
    }
}
