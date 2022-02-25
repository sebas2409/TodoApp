<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;


Route::get('/tareas',[TodosController::class,'index'])->name('todos');
Route::post('/tareas', [TodosController::class,'store'])->name('todos');
Route::get('/tareas/{id}', [TodosController::class,'show'])->name('todos-edit');
Route::patch('/tareas/{id}', [TodosController::class,'update'])->name('todos-update');
Route::delete('/tareas/{id}', [TodosController::class,'destroy'])->name('todos-destroy');
