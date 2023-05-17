<?php

use App\Http\Controllers\API\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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

Route::prefix('/admin')->name('api.admin.')->group(function (){
    Route::middleware('auth:api-admin')->apiResource('employee', EmployeeController::class);
    /*Route::middleware('auth:admin')->prefix('/employee')->name('employee.')->group(function (){
        Route::get('/', function (Request $request) {
            return 'employees';
        })->name('list');
    });*/
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

