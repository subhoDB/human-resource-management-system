<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\SubsctiptionPlan;

class UserController extends Controller {
    
    public function index() {
        return "Index function";
    }

    // public function active_plans() {
    //     $data = [];
    //     $plans = SubsctiptionPlan::where('status','active')->get();
        
    //     if(!$plans) {
    //         return response()->json(['msg' => 'Bad request' , 'data' => [], 'error' => true ], 400);
    //     }

    //     foreach($plans as $plan) {
    //         $data[] = [
    //             'pack_id' => $plan->id,
    //             'pack_name' => $plan->pack_name,
    //             'actual_price' => $plan->actual_price,
    //             'pack_validity' => $plan->pack_validity
    //         ];
    //     }

    //     return response()->json(['msg' => 'Subscription plans' , 'data' => $data, 'error' => false ], 400);
    // }

    public function register(Request $request) {

        $validaltor = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            'current_password' => 'required|same:password'
        ]);

        if($validaltor->fails()) {
            // $validaltor->errors() // if you want to see validation error then
            return response()->json(['msg' => 'Bad request' , 'data' => [], 'error' => true ], 400);
        }

        $input = $request->all();

        $input['name'] = $input['name'];
        $input['email'] = $input['email'];

        // $input['package_id'] = (isset($input['package_id'])) ? $input['package_id'] : NULL;
        $input['company_name'] = (isset($input['company_name'])) ? $input['company_name'] : NULL;

        $input['password'] = bcrypt($input['password']);

        // Insert user table
        $user = User::create($input);

        return response()->json(['msg' => 'Registerd Successfully!', 'data' => $user, 'error' => false],200);
    }

    public function login(Request $request) {
        // return 'sdadasd';
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $responseArray = [];
            // $responseArray['name'] = $user->name;
            $responseArray['token'] = $user->createToken('Human Resourse Management System')->accessToken;
            return response()->json(['msg' => 'Welcome', 'data' => $responseArray, 'error' => false],200);
        } else {
            // return response()->json(['message' => 'Unauthorised'], 203);
            return response()->json(['msg' => 'User Invalid', 'data' => [], 'error' => true],402);
        }
    }
}