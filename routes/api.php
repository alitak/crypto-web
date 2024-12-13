<?php

declare(strict_types=1);

use App\Http\Controllers\Api\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('transactions', TransactionController::class);
