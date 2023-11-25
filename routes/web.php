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
    Route::get('/tampilProfile', [App\Http\Controllers\UserController::class, 'tampilProfile'])->name('tampilProfile');
    Route::post('/updateProfile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('updateProfile');
});

Route::middleware(['auth' ,'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/tampilProfile', [App\Http\Controllers\AdminController::class, 'tampilProfile'])->name('admin.tampilProfile');
    Route::post('/admin/updateProfile', [App\Http\Controllers\AdminController::class, 'updateProfile'])->name('admin.updateProfile');
});
