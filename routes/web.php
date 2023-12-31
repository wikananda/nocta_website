<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
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
    Route::get('/details', [AdminController::class, 'Details'])->name('admin.details')->middleware('admin');
    Route::get('/details/user/{id}', [AdminController::class, 'UserDetails'])->name('admin.user-details')->middleware('admin');
    Route::patch('/details/users/{id}', [AdminController::class, 'updateUser'])->name('admin.update-user');
    Route::delete('/details/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete-user');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/{game}', [AdminController::class, 'showGameFeedbacks'])->name('admin.game-feedback')->middleware('admin');
    Route::get('/{game}/{id}', [FeedbackController::class, 'show'])->name('feedback.show');
    Route::post('/feedback/{id}/reply', [FeedbackController::class, 'reply'])->name('feedback.reply');
});


/* ---------------------------- Feedback Route --------------------------- */
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


/* ---------------------------- User Route ---------------------------- */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/games', function () {
    return view('games');
});

Route::get('/before-silence', function () {
    return view('before-silence');
});

Route::get('/gravity-jump', function () {
    return view('gravity-jump');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::post('/become-tester/{gameId}', [UserController::class, 'updateTester'])->name('update.tester');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

