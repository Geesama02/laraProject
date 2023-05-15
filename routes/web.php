<?php

use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\Admin\ProfesseurController as AdminProfesseurController;
use App\Http\Controllers\Admin\EleveController as AdminEleveController;
use App\Http\Controllers\Admin\ClubController as AdminClubController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Prof\EleveController as ProfEleveController;
use App\Http\Controllers\Prof\ClubController as ProfClubController;
use App\Http\Controllers\Prof\DashboardController as ProfDashboardController;
use App\Http\Controllers\Prof\ActiveteController as ProfActiveteController;
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
    return redirect('/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware('admin')->name("admin.")->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('dashboard', AdminDashboardController::class);
    Route::resource('professeurs', AdminProfesseurController::class);
    Route::resource('club', AdminClubController::class);
    Route::resource('eleves', AdminEleveController::class);
});
Route::prefix('prof')->middleware('prof')->name("prof.")->group(function () {
    Route::get('/dashboard', function () {
        return view('prof.dashboard');
    })->name('dashboard');
    
    Route::resource('dashboard', ProfDashboardController::class);
    Route::resource('eleves', ProfEleveController::class);
    Route::resource('clubes', ProfClubController::class);
    Route::resource('activetes', ProfActiveteController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/club', [ClubController::class,'index'])->name('club');
// Route::delete('/clubes/{id}',[ClubController::class,'destroy'])->name('');
require __DIR__.'/auth.php';
// Route::delete('/products/{id}',[ProductController::class,'destroy']);
