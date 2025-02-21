<?php

use App\Enums\UserRole;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::apiResource('/locations', LocationController::class)->only([
        'index',
        'show'
    ]);
    Route::post('/track-inventory', [InventoryController::class, 'trackInventory']);
})->middleware('guest');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/timelines', TimelineController::class);
    Route::get('/user-profile', [UserController::class, 'getUserProfile']);
    Route::get('/download-inventories', [InventoryController::class, 'downloadInventories']);
    Route::apiResource('/inventories', InventoryController::class);
    // Super Admins
    Route::middleware(['role:' . UserRole::SUPERADMIN->value])->group(function () {
        Route::apiResource('/locations', LocationController::class)->only(['store', 'update', 'destroy']);
        Route::post('/assign-user-role', [UserController::class, 'assignUserRole']);
        Route::post('/delete-users', [UserController::class, 'deleteUsers']);
        Route::post('/inventory-timeline', [InventoryController::class, 'createInventoryTimeline']);
    });
});
