<?php

declare(strict_types=1);

use App\Http\Controllers\Web\FcmTokenController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\TransactionController;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\TransactionTriggeredNotification;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('transactions', TransactionController::class)->name('transactions.index');

Route::post('fcm-tokens', FcmTokenController::class)->name('fcm-tokens.store');

Route::get('t', function () {
    User::all()->each(fn ($user) => $user->notify(new TransactionTriggeredNotification(Transaction::query()->latest()->first())));
});
