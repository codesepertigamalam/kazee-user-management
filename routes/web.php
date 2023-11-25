<?php
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth' ,'user-access:user'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'userDashboard'])->name('dashboard');
});
