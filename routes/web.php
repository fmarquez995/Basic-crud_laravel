<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tareasController;

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
    return redirect('/tareas');
});




Route::get('/tareas', function () {
    return view('tareas.index');
});


Route::get('/tareas',[tareasController::class,'index'])->name('tareas');
Route::post('/tareas',[tareasController::class,'store'])->name('tareas');
Route::get('/tareas/{id}',[tareasController::class,'show'])->name('tareas-edit');
Route::patch('/tareas/{id}',[tareasController::class,'update'])->name('tareas-update');
Route::delete('/tareas/{id}',[tareasController::class,'destroy'])->name('tareas-destroy');
