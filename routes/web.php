<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerifyInviteController;

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

Route::view('/', 'welcome')->name('welcome');

Route::get('/dashboard', function () {
    $userrole = auth()->user()->role;  // get the role of the user
    return view($userrole . '/dashboard');  // return the dashboard based on the role
})->middleware(['auth', 'verified'])->name('dashboard');    // middleware to check if the user is authenticated and verified


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



require __DIR__ . '/auth.php';
