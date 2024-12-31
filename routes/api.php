<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;




Route::middleware('auth:api')->name('api.')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('scope:view-user')->name('user');

    Route::get('/logmeout', [AuthController::class, 'logmeout'])->name('logmeout');

    Route::post('different-account',[AuthController::class, 'differentAccount'])->name('different-account');

});