<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Resources\TransactionResource;
use App\Http\Resources\WalletResource;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Number;
use Inertia\Inertia;
use Inertia\Response;

class HomeController
{
    const START_DATE = '2024-12-02';

    public function __invoke(): Response
    {
        $wallet = Wallet::query()->orderBy('coin')->get();

        return Inertia::render('Home', [
            'transactions' => Inertia::merge(
                TransactionResource::collection(
                    Transaction::query()->latest('happened_at')->paginate(17)
                ),
            ),
            'wallets'      => WalletResource::collection($wallet),
            'total'        => $this->calculateTotals($wallet),
        ]);
    }

    protected function calculateTotals(Collection $wallet): array
    {
        $totalStartingBalance = $wallet->sum('start_account');
        $totalBalance = $wallet->sum(static function (Wallet $wallet): float {
            return $wallet->stock * $wallet->current_price + $wallet->account;
        });
        $totalProfit = $totalBalance - $totalStartingBalance;
        $totalPnl = $totalProfit / $totalStartingBalance * 100;

        $days = now()->diff(self::START_DATE)->absolute()->get('days');
        $dailyInterest = (((1 + $totalPnl / 100) ** (1 / $days)) - 1) * 100;
        $monthlyInterest = (($dailyInterest / 100 + 1) ** 30 - 1) * 100;
        $yearlyInterest = (($dailyInterest / 100 + 1) ** 365 - 1) * 100;

        return [
            'total_starting_balance' => Number::format($totalStartingBalance, 2, locale: 'hu-HU'),
            'total_balance'          => Number::format($totalBalance, 2, locale: 'hu-HU'),
            'total_account'          => Number::format($wallet->sum('account'), 2, locale: 'hu-HU'),
            'total_profit'           => Number::format($totalProfit, 2, locale: 'hu-HU'),
            'total_pnl'              => Number::percentage($totalPnl, 2, locale: 'hu-HU'),
            'monthly_interest'       => Number::percentage($monthlyInterest, 2, locale: 'hu-HU'),
            'yearly_interest'        => Number::percentage($yearlyInterest, 2, locale: 'hu-HU'),
        ];
    }
}
