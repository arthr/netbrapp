<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnepageController extends Controller
{
    public function home(Request $request)
    {
        return view('onepage');
    }

    public function subscribe(Request $request)
    {
        if (is_null($request->input('form-anti-honeypot', null))):
            $this->validate($request, [
                'name' => 'required|max:150',
                'email' => 'required|email',
                'message' => 'required|max:255',
            ]);

            dd($request->all());
        else:
            //TODO: TRATAR SPAM BOT
        endif;
    }

    public function register(Request $request)
    {

    }
}
