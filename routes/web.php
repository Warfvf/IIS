<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TypeaheadController;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('post-login');
Route::get('registration', [AuthController::class, 'registration'])->name('registration');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('post-registration');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [MainController::class, 'home'])->name('home');


Route::get('/search', [TypeaheadController::class, 'index'])->name('index');;
Route::post('/search', [TypeaheadController::class, 'indexSubmit'])->name('index-submit');
Route::get('/search-faze-two', [TypeaheadController::class, 'indexNext'])->name('search-faze-two');;
Route::post('/search-faze-two', [TypeaheadController::class, 'indexSubmitFazeTwo'])->name('index-submit-faze-two');;

Route::get('/search-results', [TypeaheadController::class, 'searchResults'])->name('search-results');;


Route::get('/autocomplete-search', [TypeaheadController::class, 'autocompleteSearch']);



Route::get('/route-list', [BusController::class, 'routeList'])->name('route-list');
Route::get('/stop-list', [BusController::class, 'stopList'])->name('stop-list');
Route::get('/bus-list', [BusController::class, 'busList'])->name('bus-list');


Route::get('/create-bus', [BusController::class, 'createBus'])->name('create-bus')->middleware('can:create-bus');
Route::post('/create-bus', [BusController::class, 'createBusSubmit'])->name('create-bus-submit')->middleware('can:create-bus');
Route::get('/edit-bus/{id}', [BusController::class, 'editBus'])->name('edit-bus')->middleware('can:edit-bus');
Route::post('/edit-bus/{id}', [BusController::class, 'editBusSubmit'])->name('edit-bus-submit')->middleware('can:edit-bus');
Route::post('/delete-bus/{id}', [BusController::class, 'deleteBus'])->name('delete-bus')->middleware('can:delete-bus');


Route::get('/create-stop', [StopController::class, 'createStop'])->name('create-stop')->middleware('can:create-stop');
Route::post('/create-stop', [StopController::class, 'createStopSubmit'])->name('create-stop-submit')->middleware('can:create-stop');
Route::get('/edit-stop/{id}', [StopController::class, 'editStop'])->name('edit-stop')->middleware('can:edit-stop');
Route::post('/edit-stop/{id}', [StopController::class, 'editStopSubmit'])->name('edit-stop-submit')->middleware('can:edit-stop');
Route::post('/delete-stop/{id}', [StopController::class, 'deleteStop'])->name('delete-stop')->middleware('can:delete-stop');

// Route route
Route::get('/create-route', [RouteController::class, 'createRoute'])->name('create-route')->middleware('can:create-route');
Route::post('/create-route', [RouteController::class, 'createRouteSubmit'])->name('create-route-submit')->middleware('can:create-route');
Route::get('/edit-route/{id}', [RouteController::class, 'editRoute'])->name('edit-route')->middleware('can:edit-route');
Route::post('/edit-route/{id}', [RouteController::class, 'editRouteSubmit'])->name('edit-route-submit')->middleware('can:edit-route');
Route::post('/delete-route/{id}', [RouteController::class, 'deleteRoute'])->name('delete-route')->middleware('can:delete-route');

Route::get('/add-stop-to-route/{id}', [TypeaheadController::class, 'addStopToRoute'])->name('add-stop-to-route')->middleware('can:create-route');
Route::post('/add-stop-to-route/{id}', [TypeaheadController::class, 'addStopToRouteSubmit'])->name('add-stop-to-route-submit')->middleware('can:create-route');
Route::post('/delete-last-stop/{id}', [TypeaheadController::class, 'deleteLastStop'])->name('delete-last-stop')->middleware('can:delete-route');





Route::get('/create-buses', [BusController::class, 'createBuses'])->name('create-buses');
Route::get('/delete-all', [BusController::class, 'deleteAll'])->name('delete-all');

