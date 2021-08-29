<?php

use App\Http\Controllers\Csv_FilesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\Contacts_LogsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//All of the routes below pass through  authentication
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/csv',[Csv_FilesController::class,'get'])->name('csv');

Route::post('/csvload',[Csv_FilesController::class, 'save'])->name('csvload');
Route::post('/loadtodb',[Csv_FilesController::class, 'load'])->name('load');
Route::get('/contacts',[ContactsController::class,'get'])->name('contacts');
Route::post('/contactsimport',[ContactsController::class,'import'])->name('contactsimport');

Route::post('/validatefield',[ContactsController::class,'validatefield'])->name('validatefield');
Route::post('/todb',[ContactsController::class,'todb'])->name('todb');
Route::get('/logs',[Contacts_LogsController::class,'get'])->name('logs');

});
