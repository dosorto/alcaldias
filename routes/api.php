<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordResetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarrioController;
use App\Http\Controllers\ProfesionOficioController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\PagoUsuarioController;
use App\Http\Controllers\PropiedadUsuarioController;

Route::post('/login', [UserController::class, 'login']);
Route::post('/check_identity', [UserController::class, 'check_identity']);
Route::post('/user', [UserController::class, 'create_user']);
Route::middleware('auth:sanctum')->get('/contribuyente', [UserController::class, 'getContribuyenteData']);
Route::middleware('auth:sanctum')->get('/user/pagos', [UserController::class, 'get_pagos_by_User']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para Barrio
Route::get('/barrios', [BarrioController::class, 'index']);
Route::get('/barrios/{name}', [BarrioController::class, 'showByName']);

// Rutas para Profesion_oficio
Route::get('/profesiones', [ProfesionOficioController::class, 'index']);
Route::get('/profesiones/{name}', [ProfesionOficioController::class, 'showByName']);

// Rutas para Tipo_documento
Route::get('/tipos-documento', [TipoDocumentoController::class, 'index']);
Route::get('/tipos-documento/{name}', [TipoDocumentoController::class, 'showByName']);

// Ruta para obtener pagos pendientes
Route::middleware('auth:sanctum')->get('/user/pagos-pendientes', [PagoUsuarioController::class, 'getPagosPendientes']);

// Ruta para obtener pagos realizados
Route::middleware('auth:sanctum')->get('/user/pagos-realizados', [PagoUsuarioController::class, 'getPagosRealizados']);
Route::middleware('auth:sanctum')->get('/user/propiedades', [PropiedadUsuarioController::class, 'getPropiedades']);
Route::middleware('auth:sanctum')->get('/user/propiedades/{id}', [PropiedadUsuarioController::class, 'getGeoreferenciaciones']);

Route::post('/password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');