<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Resources\TransactionResource;
use App\Http\Resources\WalletResource;
use App\Models\Transaction;
use App\Models\Wallet;
use Inertia\Inertia;
use Inertia\Response;

class HomeController
{
    public function __invoke(): Response
    {
        return Inertia::render('Home', [
            'transactions' => Inertia::merge(
                TransactionResource::collection(
                    Transaction::query()->latest('happened_at')->paginate(10)
                ),
            ),
            'wallets'      => WalletResource::collection(Wallet::query()->orderBy('coin')->get()),
        ]);
    }
}
