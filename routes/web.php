<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ExcelExportController;
use App\Http\Controllers\Users;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('customer/view-import', [ExcelExportController::class, 'index'])->name('customer.view-import');
    Route::post('customer/import', [ExcelExportController::class, 'importExcelData'])->name('customer.import');
    Route::get('customer/import', function ($id) {
        return redirect()->route('login');
    });
});
Route::get('/register', [UsersController::class, 'index'])->name('register');
Route::post('/register', [UsersController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');