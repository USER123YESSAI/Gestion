<?php
use App\Http\Controllers\NoteController;
use App\Http\Controllers\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EtudiantController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/etudiant',[EtudiantController::class,'index'])->name('etudiant.index');
Route::get('/etudiant/create',[EtudiantController::class,'create'])->name('etudiant.create');
Route::post('/etudiant/store',[EtudiantController::class,'store'])->name('etudiant.store');
Route::delete('/etudiant/delete/{etudiant}',[EtudiantController::class,'delete'])->name('etudiant.delete');
Route::get('/etudiant/edit/{etudiant}',[EtudiantController::class,'edit'])->name('etudiant.edit');
Route::post('/etudiant/update/{etudiant}',[EtudiantController::class,'update'])->name('etudiant.update');




Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/note',[NoteController::class,'index'])->name('note.index');
Route::get('/note/create',[NoteController::class,'create'])->name('note.create');
Route::post('/note/store',[NoteController::class,'store'])->name('note.store');
Route::delete('/note/delete/{note}',[NoteController::class,'delete'])->name('note.delete');
Route::get('/note/edit/{note}',[NoteController::class,'edit'])->name('note.edit');
Route::post('/note/update/{note}',[NoteController::class,'update'])->name('note.update');

