<?php

use App\Livewire\Persona\Persona;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([ 'auth:sanctum',  'verified', ])->group(function () {
    // Route::get('/personas', Persona::class);
    Route::get('/dashboard', function () {
     return view('dashboard');})->name('dashboard');
     Route::get('/crear-persona', function () {
        return view('livewire.persona.crearPersona');})->name('crear-persona');
    Route::get('/personas', function () {
        return view('livewire.persona.persona');})->name('personas');
});
