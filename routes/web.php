<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [NoteController::class, "index"])->middleware('auth')->name("home");
Route::resource('/notes', NoteController::class)->middleware('auth');

Route::get("/register", [RegisterController::class, "create"])->middleware('guest')->name("register");
Route::post("/register", [RegisterController::class, "store"])->middleware('guest');

Route::get("login", [LoginController::class, "index"])->name('login')->middleware("guest");
Route::post("login", [LoginController::class, "authenticate"]);
Route::post("logout", [LoginController::class, "logout"]);
