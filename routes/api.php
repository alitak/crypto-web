<?php

declare(strict_types=1);

use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\WalletController;
use Illuminate\Support\Facades\Route;

Route::get('transactions', [TransactionController::class, 'index'])->name('api.transactions.index');
Route::post('transactions', [TransactionController::class, 'store']);

Route::post('wallets', WalletController::class);
