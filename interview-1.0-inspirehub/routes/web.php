<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Ability\AbilityController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Darasa\DarasaController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Darasa\DarasaStudentController;
use App\Http\Controllers\Darasa\DarasaAttendanceController;
use App\Http\Controllers\Darasa\DarasaAttendanceUserController;
use App\Http\Controllers\Email\EmailController;

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

Route::resource('events',EventController::class);
Route::resource('darasas',DarasaController::class);
Route::resource('darasas.students',DarasaStudentController::class);
Route::resource('darasas.attendances',DarasaAttendanceController::class);
Route::resource('darasas.attendances.students',DarasaAttendanceUserController::class)->only(['create','index','store']);
Route::resource('emails',EmailController::class);
Route::resource('users',UserController::class);
Route::resource('students',StudentController::class);
Route::resource('roles',RoleController::class);
Route::resource('abilities',AbilityController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
