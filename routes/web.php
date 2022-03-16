<?php

use App\Http\Controllers\CompanyController;
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

Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//company routes
Route::get('/companies',[CompanyController::class,'index'])->name('company.index');
Route::get('/create/Company',[CompanyController::class,'create'])->name('company.create');
Route::post('/store/Company',[CompanyController::class,'store'])->name('company.store');
Route::get('/edit/Company/{id}',[CompanyController::class,'edit'])->name('company.edit');
Route::post('/update/Company/{id}',[CompanyController::class,'update'])->name('company.update');
Route::get('/destroy/Company/{id}',[CompanyController::class,'destroy'])->name('company.destroy');
Route::get('/company/search',[CompanyController::class,'search'])->name('company.search');


//Employee routes
Route::get('/employees',[EmployeeController::class,'index'])->name('employee.index');
Route::get('/create/employee',[EmployeeController::class,'create'])->name('employee.create');
Route::post('/store/employee',[EmployeeController::class,'store'])->name('employee.store');
Route::get('/edit/employee/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
Route::post('/update/employee/{id}',[EmployeeController::class,'update'])->name('employee.update');
Route::get('/destroy/employee/{id}',[EmployeeController::class,'destroy'])->name('employee.destroy');
Route::get('/employee/search',[EmployeeController::class,'search'])->name('employee.search');
// Route::get('/search',[EmployeeController::class,'search'])->name('employee.search');