<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveysController;
use App\Http\Controllers\ResponsesController;
use App\Http\Controllers\EncuestaController;

Route::get('/car', [EncuestaController::class, 'showFormCar'])->name('car.add');
Route::post('/car/store', [EncuestaController::class, 'store'])->name('car.store');
Route::get('/car/list', [EncuestaController::class, 'showListCar'])->name('car.list');  
Route::get('/car/delete/{id}', [EncuestaController::class, 'DeleteCar'])->name('car.delete');  
Route::get('/car/edit/{id}', [EncuestaController::class, 'showEditCar'])->name('car.edit');  
Route::put('/car/edit/{id}/update', [EncuestaController::class, 'update'])->name('car.update');  


Route::get('/list', [ResponsesController::class, 'showList']);  
Route::get('/list/{id}', [ResponsesController::class, 'showListDetails']);  
Route::get('/{id?}', [SurveysController::class, 'showForm'])->name('survey.form');
Route::post('/survey/submit', [SurveysController::class, 'submitForm'])->name('survey.submit');
