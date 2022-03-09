<?php

use App\Http\Controllers\ClientController;
use Illuminate\Routing\Route;


// Client
Route::get('/dashboard/clients/manage', [ClientController::class, 'showUnapproved'])->middleware(['client'])->name('client.manage');
// Route::post('/dashboard/clients/approve/{id}', [ClientController::class, 'approve'])->middleware(['client'])->name('client.approve');
Route::post('/dashboard/clients/reject/{id}', [ClientController::class, 'reject'])->middleware(['client'])->name('client.reject');
// Route::get('/dashboard/clients/approved', [ClientController::class, 'showApproved'])->middleware(['client'])->name('client.approved');


Route::get('/dashboard/clients', [ClientController::class, 'index'])->name('client.index');
Route::get('/dashboard/clients/approve', [ClientController::class, 'approve'])->name('client.approve');

Route::post('/dashboard/clients/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/dashboard/clients/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/dashboard/clients/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
Route::get('/dashboard/clients/update/{id}', [ClientController::class, 'update'])->name('client.update');
Route::delete('/dashboard/clients/delete/{id}', [ClientController::class, 'destroy'])->name('client.delete');
Route::get('/dashboard/clients/{id}', [ClientController::class, 'show'])->name('client.show');


Route::post('/force-logout', [ClientController::class, 'forcelogout']);