<?php

use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('professeurs', ProfesseurController::class);
    Route::resource('club', ClubController::class);
    Route::resource('eleves', EleveController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/club', [ClubController::class,'index'])->name('club');
// Route::delete('/clubes/{id}',[ClubController::class,'destroy'])->name('');
require __DIR__.'/auth.php';
// Route::delete('/products/{id}',[ProductController::class,'destroy']);
