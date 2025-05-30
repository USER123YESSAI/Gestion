<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});


    Route::resource('etudiants', EtudiantController::class);
    Route::resource('evaluations', EvaluationController::class);

    Route::get('notes/{evaluation}', [NoteController::class, 'create'])->name('notes.create');
    Route::post('notes', [NoteController::class, 'store'])->name('notes.store');

    Route::get('statistiques', [NoteController::class, 'statistiques'])->name('notes.statistiques');
