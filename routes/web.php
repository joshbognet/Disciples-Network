<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\User\MemberController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DashboardController;

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
Route::middleware(['guest'])->get('/', [WelcomeController::class, 'show'])->name('welcome');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->prefix('user')->group(function () {
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('profile/{user:username}',[ProfileController::class, 'show'])->name('profiles.show');
    Route::get('members', [MemberController::class, 'index'])->name('members.index');
});
