<?php
use App\Livewire\ImportarExcel;
use App\Http\Controllers\Detallesuscripcion;
use App\Http\Controllers\Sesioncaja;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Role\PermissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Livewire\HistorialContribuyente;
use App\Livewire\cobros;
use App\Livewire\PerfilContribuyente;
use Illuminate\Support\Facades\View;
use App\Livewire\RoleManager;

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
Route::get('/tipos', function()
{
   return View::make('tipos');
});

Route::get('/niveles', function()
{
   return View::make('niveles');
});


Auth::routes();
Route::get('/prueba2', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/prueba', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/users', [App\Http\Controllers\AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}/edit', [App\Http\Controllers\AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [App\Http\Controllers\AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});
// // Rutas para role
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

Route::get('/tipo-documento', function () {
    return View::make('tipo-documento');
});

Route::get('/profesion-oficio', function () {
    return View::make('profesion-oficio');
});

Route::get('/barrios', function() {
   return View::make('barrios');
});

Route::get('/servicio', function () {
    return view('servicio');
})->name('servicio');

Route::get('/contribuyente', function () {
    return View::make('contribuyente');
});

Route::get('/suscripciones', function () {
    return View::make('suscripciones');
});


Route::get('/perfil', function () {
    return View::make('perfil-contribuyente');
})->name('contribuyente.perfil');

Route::get('/factura', function () {
    return View::make('factura');
});


Route::get('/pago-servicio', function () {
    return View::make('pago-servicio');
});

<<<<<<< HEAD

=======
>>>>>>> origin/Osman
Route::get('/TipoPropiedad', function () {
    return View::make('tipo-propiedad');
})
->name('tipo-propiedad');

<<<<<<< HEAD
Route::get('/Propiedad', function () {
    return View::make('propiedad');
})
->name('propiedad');

=======
>>>>>>> origin/Osman
Route::get('/detalle-suscripcion/{id}', function ($id) {
    return view('detalle-suscripcion', ['id' => $id]);
})->name('contribuyente.show');

Route::get('/Georreferenciacion', function () {
    return View::make('georreferenciaciones');
})->name('georreferenciacion');


// Route::get('/detalle-suscripcion/{id}', [\App\Http\Controllers\Detallesuscripcion::class, 'show'])->name('contribuyente.show');
// Route::post('/detallesuscripcion/agregar-servicio', [Detallesuscripcion::class, 'agregarServicio'])->name('contribuyente.agregar-servicio');
// Route::delete('/detallesuscripcion/{suscripcion}/eliminar', [Detallesuscripcion::class, 'eliminarServicio'])->name('suscripcion.eliminar');

Route::get('/sesioncaja/{id}', [\App\Http\Controllers\Sesioncaja::class, 'show'])->name('sesioncaja.show');
Route::get('/consultatri/{contribuyenteId}', [\App\Http\Controllers\Sesioncaja::class, 'consultatri'])->name('consultatri');
Route::post('/consulta', [Sesioncaja::class, 'consulta'])->name('consulta');
Route::get('/facturacaja/{id}', [Sesioncaja::class, 'imprimirFactura'])->name('imprimir_factura');
Route::get('/reportecierrefactura', [Cobros::class, 'imprimirFactura'])->name('reportecierre');

Route::post('/sesioncaja/store', [Sesioncaja::class, 'store'])->name('crear_sesion');
Route::post('/procesar-pago', [Sesioncaja::class, 'procesarPago'])->name('procesar_pago');


//Route::post('/sesiones', [Sesioncaja::class, 'store'])->name('sesiones');
//Route::post('/sesiones', [SesionCajaController::class, 'store'])->name('sesiones.store');

Route::get('/pago-servicio/generate', function () {
    return View::make('generar-pago');
})->name('generar.pago');

Route::get('/historial-contribuyente', function () {
    return View::make('historial-contribuyente');
})->name('contribuyente.showHistory');

Route::get('/factura/{id}', [HistorialContribuyente::class, 'generarFactura'])->name('generar.factura');

Route::get('/cobros', function () {
    return View::make('cobros');
});

Route::get('/sesiones', function () {
    return View::make('sesiones');
});

Route::get('/reportecierre', function () {
    return View::make('reportecierre');
});

Route::get('/configuracion', function () {
    return View::make('configuracion');
});

Route::get('/perfil_usuario', function () {
    return View::make('perfil-usuario');
});

Route::get('/reporte', function () {
    return View::make('reporte-ingresos');

});

Route::get('/consultatributaria', function () {
    return View::make('consulta-tributaria');
});

Route::get('/cierre-modal', function () {
    return View::make('cierre-sesion');
});

Route::get('/graficas', function () {
    return view('graficas');
})->name('graficas');

