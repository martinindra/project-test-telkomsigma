<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// -------AUTH ROUTE
// register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register/submit', [AuthController::class, 'submitRegister'])->name('register.submit');
// Login
Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submitlogin'])->name('login.submit');
// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// -------DASHBOARD ROUTE
// Dashboard page
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.show');
// create data
Route::get('/addgame', [DashboardController::class, 'showAddGame'])->name('addgame.show');
Route::post('/addgame/submit', [DashboardController::class, 'submitAddGame'])->name('addgame.submit');
// read data
Route::get('/dashboard/gamelist', [DashboardController::class, 'showGameList'])->name('dashboard.gamelist');
Route::get('/dashboard/game/{id}', [DetailController::class, 'dashboardDetail']);
// update data
Route::get('/update/game/{id}', [DashboardController::class, 'showEditGame'])->name('game.update-show');
Route::post('/update/game/edit/{id}', [DashboardController::class, 'submitEditGame'])->name('game.update-submit');
// delete
Route::get('/delete/game/{id}', [DashboardController::class, 'destroy'])->name('game.delete');

// ----HOME ROUTE
// home page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{id}', [HomeController::class, 'getDataWithPlatform']);
Route::post('/search/submit', [HomeController::class, 'searchFilterData'])->name('search.submit');
// detail page
Route::get('detail/{id}', [DetailController::class, 'index']);
