<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InvestplanApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');





Route::group(['prefix' => 'v1'], function () {

    Route::get('/products', [ProductController::class, 'index'])->name('product');

    // Invest Plan API routes
    Route::prefix('invest-plan')->group(function () {
        Route::get('/', [InvestplanApiController::class, 'getInvestPlan']);
        Route::get('/{id}', [InvestplanApiController::class, 'getInvestPlanById']);
        Route::post('/', [InvestplanApiController::class, 'postInvestPlan']);
        Route::post('/update/{id}', [InvestplanApiController::class, 'putInvestPlan']);
        Route::delete('/{id}', [InvestplanApiController::class, 'deleteInvestPlan']);
    });

    

});
