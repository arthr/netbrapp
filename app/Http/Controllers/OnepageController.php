<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class OnepageController extends Controller
{
    public function home(Request $request)
    {

        // $role = Role::create(['name' => 'administrator']);
        // $permissions = [
        //     Permission::create(['name' => 'view']),
        //     Permission::create(['name' => 'create']),
        //     Permission::create(['name' => 'edit']),
        //     Permission::create(['name' => 'delete'])
        // ];
        // $role->syncPermissions($permissions);

        if(Auth::check()){
            $user = Auth::user();
            dd($user->getAllPermissions());
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
