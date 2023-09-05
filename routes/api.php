<?php

use App\Http\Controllers\TechTest;
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


Route::get('/q1', [TechTest::class, 'q1']);

Route::get('/users', [TechTest::class, 'fetchAll']);
Route::get('/user/{id}', [TechTest::class, 'fetch']);
Route::post('/user', [TechTest::class, 'create']);
Route::post('/user/{id}', [TechTest::class, 'updateUser']);
Route::delete('/user/{id}', [TechTest::class, 'deleteUser']);