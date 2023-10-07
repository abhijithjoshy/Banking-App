<?php

use App\Http\Controllers\BankingController;
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

Route::get('/dashboard',[BankingController::class, 'dashboard']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/deposit', function () {
    return view('deposit');
})->middleware(['auth', 'verified'])->name('deposit');


Route::get('/withdraw', function () {
    return view('withdraw');
})->middleware(['auth', 'verified'])->name('withdraw');


Route::get('/transfer', function () {
    return view('transfer');
})->middleware(['auth', 'verified'])->name('transfer');


Route::get('/statement',[BankingController::class,'statement_index'])->middleware(['auth', 'verified'])->name('statement');

Route::post('deposit',[BankingController::class,'deposit']);
Route::post('withdraw',[BankingController::class,'withdraw']);
Route::post('transfer',[BankingController::class,'transfer']);







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
