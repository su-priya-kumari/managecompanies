<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
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

Route::get('/',[AdminController::class,'loginpage'])->name('loginpage');
Route::post('/login',[AdminController::class,'login'])->name('login');
Route::get('/index',[AdminController::class,'index'])->name('index');

// Route::get('/companypage',[CompaniesController::class,'index'])->name('companypage');
Route::resource('companies', CompaniesController::class);

// Route::get('/employeepage',[EmployeesController::class,'index'])->name('employeepage');
Route::resource('employees',EmployeesController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
