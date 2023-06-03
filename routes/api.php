<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/register', [AuthController::class, 'register'])->name('api.register');

Route::name('api.')->middleware('auth:sanctum')->group(function () {

    Route::post('/customer',[CustomerController::class,'store']);
    Route::get('/reports/customerOrdersInCity',[CustomerController::class,'getCustomerOrdersInCity']);
    Route::get('/reports/totalsCountOrdersByCity',[CustomerController::class,'totalsCountOrdersByCity']);
});
