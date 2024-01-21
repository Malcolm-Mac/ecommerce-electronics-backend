<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


/*◊ Authentication endpoints ◊*/
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('user-profile', [AuthController::class, 'userProfile']);
});

/*◊ Brands CRUD ◊*/
Route::controller(BrandsController::class)->group(
    function () {
        Route::get('index', 'index');
        Route::get('show/{id}', 'show');
        Route::post('store', 'store');
        Route::put('update-brand/{id}', 'update');
        Route::delete('delete-brand/{id}', 'destroy');
    }
);

/*◊ Categories CRUD ◊*/
Route::controller(CategoryController::class)->group(
    function () {
        Route::get('index', 'index');
        Route::get('show/{id}', 'show');
        Route::post('store', 'store');
        Route::put('update-category/{id}', 'update');
        Route::delete('delete-category/{id}', 'destroy');
    }
);
