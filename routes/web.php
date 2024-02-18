<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Role\PermissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Rutas para role
Route::controller(RoleController::class)->group(function () {

    Route::get('/role-list','roleList')->name('roleList');
    // Route::get('/role-create', function(){
    //     return view('role.create');
    // });
    Route::get('/role-create', 'createRole')->name('createRole');
    Route::post('/roles', 'roleCreate')->name('roleCreate');
    Route::delete('/roles/{id}', 'destroy')->name('roleDelete');
    Route::get('/role-update/{role}', 'roleUpdate')->name('rolesUpdate');
    Route::put('/roles/{role}', 'updateRole')->name('roleUpdate');
});

//Rutas para permission
Route::controller(PermissionController::class)->group(function () {

    Route::get('/permission-create', 'createPermission')->name('createPermission');
    Route::post('/permissions', 'permissionCreate')->name('permissionCreate');
    Route::delete('/permissions/{id}', 'destroy')->name('permissionDelete');
    Route::get('/permission-update/{permission}', 'permissionUpdate')->name('permissionsUpdate');
    Route::put('/permissions/{permission}', 'updatePermission')->name('permissionUpdate');
});



