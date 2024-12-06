<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

// User Routes
Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

// Transaction Routes
Route::get('transactions', [TransactionController::class, 'index']);
Route::get('transactions/{id}', [TransactionController::class, 'show']);
Route::post('transactions', [TransactionController::class, 'store']);
Route::put('transactions/{id}', [TransactionController::class, 'update']);
Route::delete('transactions/{id}', [TransactionController::class, 'destroy']);

// Category Routes
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::post('categories', [CategoryController::class, 'store']);
Route::put('categories/{id}', [CategoryController::class, 'update']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

// Goal Routes
Route::get('goals', [GoalController::class, 'index']);
Route::get('goals/{id}', [GoalController::class, 'show']);
Route::post('goals', [GoalController::class, 'store']);
Route::put('goals/{id}', [GoalController::class, 'update']);
Route::delete('goals/{id}', [GoalController::class, 'destroy']);

// Log Routes
Route::get('logs', [LogController::class, 'index']);
Route::get('logs/{id}', [LogController::class, 'show']);
Route::post('logs', [LogController::class, 'store']);
Route::put('logs/{id}', [LogController::class, 'update']);
Route::delete('logs/{id}', [LogController::class, 'destroy']);

// Notification Routes
Route::get('notifications', [NotificationController::class, 'index']);
Route::get('notifications/{id}', [NotificationController::class, 'show']);
Route::post('notifications', [NotificationController::class, 'store']);
Route::put('notifications/{id}', [NotificationController::class, 'update']);
Route::delete('notifications/{id}', [NotificationController::class, 'destroy']);
