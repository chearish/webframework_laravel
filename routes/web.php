<?php

use App\Http\Controllers\CategoryEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerEventController;
use App\Http\Controllers\WargaController;
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

// Route::get('/', action: function () {
//     return view('base');
// });
Route::get('/', [EventController::class, 'eventList'])->name('event.list');
Route::resource('events', EventController::class);
Route::resource('categories', CategoryEventController::class);
Route::resource('organizers', OrganizerEventController::class);
