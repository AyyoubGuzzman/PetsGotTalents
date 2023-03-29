<?php

namespace App\Http\Controllers;

use App\Models\Juge;
use App\Models\Test;
use App\Models\Owner;
use App\Models\Animal;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        $tests = Test::orderBy('score', 'desc')->get()->take(5);

        $totalJuge = Juge::count();
        $totalOwner = Owner::count();
        $totalTest = Test::count();
        $totalPet = Animal::count();
        return view('index', compact('totalJuge', 'totalOwner', 'totalTest', 'totalPet', 'tests'));
    }
}
