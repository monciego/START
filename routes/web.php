<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\MentoringOutliningController;
use App\Http\Controllers\ReplyNotificationController;
use App\Http\Controllers\StartController;
use App\Http\Controllers\TellReplyController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Homepage/Index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/start', StartController::class);
    Route::resource('/directory',DirectoryController::class)->only('index', 'show');
    Route::resource('/mentoring-outlining',MentoringOutliningController::class)->only('store', 'update');
    Route::resource('/reply', TellReplyController::class)->only('store', 'update');
    Route::resource('/reply-notification', ReplyNotificationController::class)->only('update', 'store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
