<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnepageController extends Controller
{
    public function home(Request $request)
    {

        if (Auth::check()) {
            $user = Auth::user();
            $cliente = $user->cliente;
            $enderecos = $cliente->enderecos->pluck('endereco');
            $pedidos = $cliente->pedidos;

            $dump = [
                $user->getAllPermissions()->pluck('name'),
                $user->getRoleNames(),
                $cliente->pluck('nome'),
                $enderecos,
                $pedidos
            ];

            dd($dump);
        }

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
