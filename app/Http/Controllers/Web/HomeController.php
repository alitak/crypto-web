<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Resources\TransactionResource;
use App\Http\Resources\WalletResource;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Number;
use Inertia\Inertia;
use Inertia\Response;

class HomeController
{
    public const int START_YEAR = 2024;

    public const int START_MONTH = 12;

    public const int START_DAY = 1;

    public const float FEE = 0.00075;

    public function __invoke(): Response
    {
        $wallet = Wallet::query()
            ->when(request('coin'), fn ($query, $coin) => $query->where('coin', $coin))
            ->orderBy('coin')
            ->get();
        $wallet->map(function (Wallet $wallet): void {
            $wallet->current_value = $wallet->stock * $wallet->current_price;
            $wallet->current_profit = ($wallet->current_value + $wallet->account) - $wallet->start_account;
        });

        $transactionPagination = Transaction::query()
            ->when(request('coin'), fn ($query, $coin) => $query->where('coin', $coin))
            ->latest('happened_at')
            ->paginate(20);

        return Inertia::render('Home', [
            'transactions'           => Inertia::merge(TransactionResource::collection($transactionPagination->items())),
            'transactionCurrentPage' => $transactionPagination->currentPage(),
            'wallets'                => fn () => WalletResource::collection($wallet),
            'total'                  => fn (): array => $this->calculateTotals($wallet),
        ]);
    }

    protected function calculateTotals(Collection $wallet): array
    {
        $totalStartingBalance = $wallet->sum('start_account');
        $days = (int)Carbon::createFromDate(self::START_YEAR, self::START_MONTH, self::START_DAY)->diff(now())->totalDays;
        $totalBalance = $wallet->sum(static fn (Wallet $wallet): float => $wallet->stock * $wallet->current_price + $wallet->account);
        $totalProfit = $totalBalance - $totalStartingBalance;
        [$totalPnl, $monthlyInterest, $yearlyInterest] = $this->calculateInterest($totalProfit, $totalStartingBalance, $days);

        $totalPotentialProfit = $wallet->sum('potential_profit');
        [$totalPotentialPnl, $potentialMonthlyInterest, $potentialYearlyInterest] = $this->calculateInterest($totalPotentialProfit, $totalStartingBalance, $days);

        return [
            'total_starting_balance'     => Number::format($totalStartingBalance, 2, locale: 'hu-HU'),
            'total_balance'              => Number::format($totalBalance, 2, locale: 'hu-HU'),
            'total_account'              => Number::format($wallet->sum('account'), 2, locale: 'hu-HU'),
            'total_profit'               => Number::format($totalProfit, 2, locale: 'hu-HU'),
            'total_pnl'                  => Number::percentage($totalPnl, 2, locale: 'hu-HU'),
            'monthly_interest'           => Number::percentage($monthlyInterest, 2, locale: 'hu-HU'),
            'yearly_interest'            => Number::percentage($yearlyInterest, 2, locale: 'hu-HU'),
        ];
    }

    protected function calculateInterest(float $totalProfit, float $totalStartingBalance, int $days): array
    {
        $totalPnl = $totalProfit / $totalStartingBalance * 100;
        $dailyInterest = (((1 + $totalPnl / 100) ** (1 / $days)) - 1) * 100;
        $monthlyInterest = (($dailyInterest / 100 + 1) ** 30 - 1) * 100;
        $yearlyInterest = (($dailyInterest / 100 + 1) ** 365 - 1) * 100;

        return [$totalPnl, $monthlyInterest, $yearlyInterest];
    }
}
