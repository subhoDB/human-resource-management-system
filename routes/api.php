<?php

use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'prefix' => 'v1', 
    'as' => 'api.',
    // 'namespace' => 'Api\V1\Admin'
  ], function () {
  Route::post('login', [UserController::class, 'login']);
  //Route::get('get_plans', 'API\UserController@active_plans');
  Route::post('register', [UserController::class, 'register']);

  // Route::middleware('auth:api')->group(function () {

  Route::middleware('auth:api')->group(function () {
    Route::get('dashboard',[DashboardController::class, 'index']);

    Route::apiResource('employee', EmployeeController::class);
  });

  // Route::get('dashboard',function() {
  //   return response()->json(['name' => 'Subhodeep bhattacharjee', 'token' => 'erxjknkj ksdkjfdf sdkfsdjfsdf sdkfjsdfkjdsfhdsjkfhsdjkfhsdbjiuyi8787bjdshfsdjf'],200);
  // });

});