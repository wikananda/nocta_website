<?php

use App\Http\Controllers\AdminController;
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

/* ---------------------------- Admin Route --------------------------- */
Route::prefix('admin')->group(function (){
    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/before-silence', function (){
        return view('admin.admin-before-silence');
    })->name('admin.before-silence')->middleware('admin');
});





/* ---------------------------- User Route ---------------------------- */

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/games', function () {
//     return view('games');
// });

Route::get('/before-silence', function () {
    return view('before-silence');
});

Route::get('/gravity-jump', function () {
    return view('gravity-jump');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/home', [AdminController::class, 'home']);
    Route::get('/feedback', [AdminController::class, 'feedback']);
    Route::get('/games', [AdminController::class, 'games']);
});

require __DIR__.'/auth.php';
