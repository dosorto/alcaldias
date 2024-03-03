<?php
use App\Livewire\ImportarExcel;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Role\PermissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\View;


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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', [App\Http\Controllers\AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}/edit', [App\Http\Controllers\AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [App\Http\Controllers\AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});
// Rutas para role
Route::controller(RoleController::class)->group(function () {


    //Route::get('/role-list', 'roleList')->name('Lista');
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
// Route::controller(PermissionController::class)->group(function () {

//     Route::get('/permission-create', 'createPermission')->name('createPermission');
//     Route::post('/permissions', 'permissionCreate')->name('permissionCreate');
//     Route::delete('/permissions/{id}', 'destroy')->name('permissionDelete');
//     Route::get('/permission-update/{permission}', 'permissionUpdate')->name('permissionsUpdate');
//     Route::put('/permissions/{permission}', 'updatePermission')->name('permissionUpdate');
// });

Route::post('/assign-role', [AdminUserController::class, 'assignRole'])->name('assign.role');

Route::get('/pais', function () {
    return view('pais');
})->name('pais');


Route::get('/departamentos', function () {
    return View::make('departamentos');
});

Route::get('/municipios', function () {
    return View::make('municipios');
});


Route::get('importar-excel', function () {
    return View::make('livewire.importar-excel');
})->name('importar-excel');

Route::get('/aldeas', function()
{
   return View::make('aldeas');
});



