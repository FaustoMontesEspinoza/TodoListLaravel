<?php

use App\Http\Controllers\TareaController;
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

Route::get('/',[TareaController::class, 'index'])->name('main');

Route::post('tareas',[TareaController::class, 'store'])->name('tareas.store');

Route::get('tareas/{tarea}/edit',[TareaController::class, 'edit'])->name('tareas.edit');

Route::match(['put','patch'],'tareas/{tarea}',[TareaController::class,'update'])->name('tareas.update');

Route::delete('tareas/{tarea}',[TareaController::class,'destroy'])->name('tareas.destroy'); 
