<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//->middleware('validate.id');

Route::get('/alumnos', [AlumnoController::class, 'index']);

Route::post('/alumnos', [AlumnoController::class, 'store']);

//One-to-One
Route::get('/shops/{id}/customer', [ShopController::class, 'getCustomer']);

//many to one
Route::get('/shops/{id}/products', [ShopController::class, 'getProducts']);


Route::middleware('validateId')->group(function () {
    Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
    Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
    Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']);
});
