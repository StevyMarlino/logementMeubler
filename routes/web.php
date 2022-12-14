<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('reservation/all-reservation', [\App\Http\Controllers\ReservationController::class, 'getAllReservation'])->name('all.reservation')->middleware('isAdmin');

        Route::get('/',[\App\Http\Controllers\LogementController::class,'home'])->name('dashboard');

        // Route pour reserver une chambre / appartement / studio
        Route::prefix('reservation')->group(function () {
            Route::get('index', [\App\Http\Controllers\ReservationController::class, 'index'])->name('reservation.index');
            Route::post('store', [\App\Http\Controllers\ReservationController::class, 'store'])->name('reservation.store');
        });

        // Route pour les logement
        Route::prefix('logement')->group(function () {
            Route::get('index', [\App\Http\Controllers\LogementController::class, 'index'])->name('logement.index');
            Route::post('store', [\App\Http\Controllers\LogementController::class, 'store'])->name('logement.store');
            Route::post('store-sachen', [\App\Http\Controllers\ListeSachenController::class, 'store'])->name('sachen.store');
            Route::get('details/{id}', [\App\Http\Controllers\LogementController::class, 'details'])->name('logement.details');
        });

        // Route invoice
        Route::prefix('invoice')->group(function () {
            Route::get('index', [\App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice.index');
            Route::post('store', [\App\Http\Controllers\InvoiceController::class, 'store'])->name('invoice.store');
            Route::get('details/{id}', [\App\Http\Controllers\InvoiceController::class, 'details'])->name('invoice.details');
        });
    });
});
