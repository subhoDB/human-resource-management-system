<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // private $user;

    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         $this->user= Auth::user();
    
    //         return $next($request);
    //     });
    // }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        
        $responseArray = [
            'user_role' => 1,
            'employees' => 30,
            'interviews' => [
                'upcomming' => 5,
                'completed' => 10,
            ],
            'candidates' => 15000,
            'requisitions' => [
                'total_requesitions' => 105,
                'open_requesitions' => 5,
                'closed_requesitions' => 85,
            ],
            'joinings' => [
                'total_joinings' => 86,
                'upcomming_joining' => 86,
                'upcomming_joining' => 86,
            ]
        ];

        return response()->json(['msg' => 'Welcome', 'data' => $responseArray, 'error' => false],200);
    }
}