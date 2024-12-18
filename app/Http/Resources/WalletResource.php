<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $currentValue = $this->stock * $this->current_price + $this->account;
        $currentProfit = $currentValue - $this->start_account - $this->fees;

        return [
            'coin'                        => $this->coin,
            'package_count'               => $this->package_count,
            'trigger_price'               => $this->trigger_price,
            'current_price'               => $this->current_price,
            'min_threshold'               => $this->min_threshold,
            'min_percent'                 => round((($this->current_price - $this->min_threshold) / $this->min_threshold) * 100, 2),
            'max_threshold'               => $this->max_threshold,
            'max_percent'                 => round((($this->max_threshold - $this->current_price) / $this->max_threshold) * 100, 2),
            'quantity'                    => $this->quantity,
            'stock'                       => $this->stock,
            'cost'                        => round($this->cost, 2),
            'avg_price'                   => $this->avg_price,
            'current_value'               => round($currentValue, 2),
            'profit'                      => round($currentProfit, 2),
            'current_pnl'                 => round($currentProfit / $this->start_account * 100, 2),
            'account'                     => round($this->account, 2),
            'fees'                        => $this->fees,
            'packet_price'                => $this->packet_price,
            'min_threshold_percent_value' => round((1 - $this->min_threshold_percent_value) * 100, 1),
            'max_threshold_percent_value' => round(($this->max_threshold_percent_value - 1) * 100),
            'start_account'               => $this->start_account,
        ];
    }
}
