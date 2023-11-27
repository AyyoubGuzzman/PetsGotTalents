<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YourController extends Controller
{
    public function value($a, $b)
        {
            $result = $a + $b;
            dd($result);
        }
}
