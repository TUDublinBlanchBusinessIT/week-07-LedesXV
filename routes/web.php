<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\memberController;
use App\Http\Controllers\courtController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\userController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\permissionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('members', memberController::class)->except(['create', 'store', 'destroy']);
Route::resource('courts', courtController::class);
Route::resource('bookings', bookingController::class)->except(['destroy']);

Route::get('/loggedInMember', [memberController::class, 'getLoggedInMemberDetails']);

Route::get('/users/assignroles/{id}', [userController::class, 'assignRoles'])
    ->name('users.assignroles');

Route::patch('/users/updateroles/{id}', [userController::class, 'updateRoles'])
    ->name('roles.rolesupdate');

Route::get('/roles/assignpermissions/{id}', [rolesController::class, 'assignPermissions'])
    ->name('roles.assignpermissions');

Route::patch('/roles/updatepermissions/{id}', [rolesController::class, 'updatePermissions'])
    ->name('roles.permissionsupdate');

Route::delete('/bookings/{booking}', [bookingController::class, 'destroy'])
    ->name('bookings.destroy')
    ->middleware('permission:Delete Booking');

Route::delete('/members/{member}', [memberController::class, 'destroy'])
    ->name('members.destroy')
    ->middleware('permission:Delete Member');

Route::group(['middleware' => ['permission:Create New Member']], function () {
    Route::get('/members/create', [memberController::class, 'create'])
        ->name('members.create');

    Route::post('/members/store', [memberController::class, 'store'])
        ->name('members.store');
});

Route::group(['middleware' => ['role:System Admin']], function () {
    Route::resource('roles', rolesController::class);
    Route::resource('permissions', permissionsController::class);
    Route::resource('users', userController::class);
});