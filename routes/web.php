<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->name('admin.')->group(function (){
    Route::middleware('auth:admin')->group(function (){
        Route::get('/', [AdminController::class,'dashboard'])->name('index');
        Route::prefix('/employee')->name('employee.')->group(function (){
            Route::get('/', [AdminController::class,'listEmployee'])->name('index');
            Route::get('/create', [AdminController::class,'createEmployee'])->name('create');
            Route::post('/', [AdminController::class,'storeEmployee'])->name('store');
            Route::get('/{employee}/edit', [AdminController::class,'editEmployee'])->name('edit');
            Route::put('/{employee}', [AdminController::class,'updateEmployee'])->name('update');
            Route::delete('/{employee}', [AdminController::class,'deleteEmployee'])->name('destroy');
        });
    });
    Route::get('/register', [RegisterController::class, 'showAdminRegisterForm'])->name('register');
    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('login');
    Route::post('/register', [RegisterController::class, 'createAdmin'])->name('register');
    Route::post('/login', [LoginController::class, 'adminLogin'])->name('login');
});

Route::prefix('/employee')->name('employee.')->group(function (){
    Route::middleware('auth:employee')->group(function (){
        Route::get('/', [EmployeeController::class,'index'])->name('index');
    });
    Route::get('/register', [RegisterController::class, 'showEmployeeRegisterForm'])->name('register');
    Route::get('/login', [LoginController::class, 'showEmployeeLoginForm'])->name('login');
    Route::post('/register', [RegisterController::class, 'createEmployee'])->name('register');
    Route::post('/login', [LoginController::class, 'employeeLogin'])->name('login');
});
//Route::view('/home', 'home')->middleware('auth');


