<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Role\RoleController;
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


//Rutas para role
Route::controller(RoleController::class)->group(function () {

    Route::get('/role-list','roleList')->name('roleList');
    Route::get('/role-create', function(){
        return view('role.create');
    });
    Route::post('/roles', 'roleCreate')->name('roleCreate');
    Route::delete('/roles/{id}', 'destroy')->name('roleDelete');
    Route::get('/role-update/{role}', 'roleUpdate')->name('rolesUpdate');
    Route::put('/roles/{role}', 'updateRole')->name('roleUpdate');
    // Route::get('/role-permission/{role}', 'rolePermission')->name('rolePermission');
    // Route::post('/roles-permission-agg/{role}', 'rolePermissionAgg')->name('rolePermissionAgg');
});

