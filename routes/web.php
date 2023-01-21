<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::resource('/companies', CompanyController::class);
        Route::post('/delete-companies', [CompanyController::class,'destroy']);

        Route::resource('/employees', EmployeeController::class);
        Route::post('/delete-employees', [EmployeeController::class,'destroy']);

//        Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
//        Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
