<?php

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
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/deposit', function () {
    return view('deposit');
})->middleware(['auth', 'verified'])->name('deposit');


Route::get('/withdraw', function () {
    return view('withdraw');
})->middleware(['auth', 'verified'])->name('withdraw');


Route::get('/transfer', function () {
    return view('transfer');
})->middleware(['auth', 'verified'])->name('transfer');


Route::get('/statement', function () {
    return view('statement');
})->middleware(['auth', 'verified'])->name('statement');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
