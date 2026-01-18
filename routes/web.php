<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashController;
use App\Http\Controllers\UserEmpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/end', function () {
    return view('end');
})->name('end');
Route::post('/check-in', [AttendanceController::class, 'checkIn'])
        ->name('checkIn');
Route::post('/check-out', [AttendanceController::class, 'checkOut'])
        ->name('checkOut');
Route::get("/login",[AuthController::class,"Showlogin"])->name('login');
Route::post("/login",[AuthController::class,"login"]);
Route::middleware(['role'])->group(function(){
Route::get('/dashboard', [UserDashController::class, 'index'])->name('dashboard');
Route::resource('employees', UserEmpController::class);
Route::delete('/attendances/{attendance}', [AttendanceController::class, 'destroy'])
         ->name('admin.attendances.destroy');
Route::post("/logout",[AuthController::class,"logout"])->name('logout');
});
