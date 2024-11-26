<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\clienteController;

Route::get('/clientes', [clienteController::class, 'index']);

Route::get('/clientes/{id}', function() {
    return 'Obtener un cliente';
});

Route::post('/clientes', [clienteController::class, 'store']);


Route::put('/clientes/{id}', function() {
    return 'Actualizando cliente';
});

Route::delete('/clientes/{id}', function() {
    return 'Borrando cliente';
});