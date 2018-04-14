<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnepageController extends Controller
{
    public function home(\Illuminate\Http\Request $request)
    {
        if ($_POST) {
            return 1;
        } else {
            return view('onepage');
        }
    }
}
