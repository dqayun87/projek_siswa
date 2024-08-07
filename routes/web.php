<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\StudentController;
use App\Models\Classroom;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::middleware('auth')->prefix('dashboard')->group(function(){
//     Route::resources([
//         'categories'=>CategoryController::class,
//         'tasks'=>TaskController::class
//     ]);

// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->prefix('dashboard')->group(function(){
    Route::resources([
        'classrooms'=>ClassroomController::class,
        'students'=>StudentController::class
    ]);

});
//Route::resource('/',GuruController::class);
