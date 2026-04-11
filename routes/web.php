<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('members', App\Http\Controllers\memberController::class);


Route::resource('courts', App\Http\Controllers\courtController::class);


Route::resource('bookings', App\Http\Controllers\bookingController::class);

Route::get('/loggedInMember','App\Http\Controllers\memberController@getLoggedInMemberDetails');

Route::resource('users', App\Http\Controllers\userController::class);


Route::resource('roles', App\Http\Controllers\rolesController::class);

Route::get('/users/assignroles/{id}','App\Http\Controllers\UserController@assignRoles')->name('users.assignroles');
Route::patch('/users/updateroles/{id}','App\Http\Controllers\UserController@updateRoles')->name("roles.rolesupdate");