<?php

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/employees/create', [App\Http\Controllers\EmployeesController::class, 'create'])->name('employees.create');
Route::get('/employees/{employee}', [App\Http\Controllers\EmployeesController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [App\Http\Controllers\EmployeesController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [App\Http\Controllers\EmployeesController::class, 'update'])->name('employees.update');
Route::post('/employee', [App\Http\Controllers\EmployeesController::class, 'store'])->name('employees.store');
Route::delete('/employees/{employee}', [App\Http\Controllers\EmployeesController::class, 'destroy'])->name('employees.destroy');
Route::get('/employees', [App\Http\Controllers\EmployeesController::class, 'index'])->name('employees.index');

Route::get('/practices/create', [App\Http\Controllers\PracticesController::class, 'create'])->name('practices.create');
Route::get('/practices/{practice}', [App\Http\Controllers\PracticesController::class, 'show'])->name('practices.show');
Route::get('/practices/{practice}/edit', [App\Http\Controllers\PracticesController::class, 'edit'])->name('practices.edit');
Route::put('/practices/{practice}', [App\Http\Controllers\PracticesController::class, 'update'])->name('practices.update');
Route::post('/practice', [App\Http\Controllers\PracticesController::class, 'store'])->name('practices.store');
Route::delete('/practices/{practice}', [App\Http\Controllers\PracticesController::class, 'destroy'])->name('practices.destroy');
Route::get('/practices', [App\Http\Controllers\PracticesController::class, 'index'])->name('practices.index');

Route::get('/fields_of_practices/create', [App\Http\Controllers\FieldsOfPracticesController::class, 'create'])->name('fields_of_practices.create');
Route::get('/fields_of_practices/{fields_of_practice}', [App\Http\Controllers\FieldsOfPracticesController::class, 'show'])->name('fields_of_practices.show');
Route::get('/fields_of_practices/{fields_of_practice}/edit', [App\Http\Controllers\FieldsOfPracticesController::class, 'edit'])->name('fields_of_practices.edit');
Route::put('/fields_of_practices/{fields_of_practice}', [App\Http\Controllers\FieldsOfPracticesController::class, 'update'])->name('fields_of_practices.update');
Route::post('/fields_of_practice', [App\Http\Controllers\FieldsOfPracticesController::class, 'store'])->name('fields_of_practices.store');
Route::delete('/fields_of_practices/{fields_of_practice}', [App\Http\Controllers\FieldsOfPracticesController::class, 'destroy'])->name('fields_of_practices.destroy');
Route::get('/fields_of_practices', [App\Http\Controllers\FieldsOfPracticesController::class, 'index'])->name('fields_of_practices.index');

Auth::routes();

Route::get('/public/practices', function(){
    return \App\Models\Practice::all();
});
