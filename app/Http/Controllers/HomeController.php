<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Permission;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    **/
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = \Auth::user();
        // assign role 
        // $role = Role::where('slug','super-admin')->first();
        // $user->roles()->attach($role);
        // dd($user->hasRole('editor'));
        
        // check permission 
        // $permission = Permission::where('slug','employee')->first();
        // $user->permissions()->attach($permission);
        // dd($user->permissions);
        // dd($user->can('add-post'));

        return view('dashboard');
    }
}
