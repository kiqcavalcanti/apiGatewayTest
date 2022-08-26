<?php

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
Route::middleware(['auth:api', 'hasRole:manage-account'])->get('/user', function (Request $request) {
    $user = $request->user();

    return response()->json([
        'name' => $user->name,
        'roles' => $user->roles()
    ]);

});
