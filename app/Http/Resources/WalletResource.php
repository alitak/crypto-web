<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

class WalletResource extends JsonResource
{
    #[Override]
    public function toArray(Request $request): array
    {
        return [
            'coin'                        => $this->coin,
            'package_count'               => $this->package_count,
            'trigger_price'               => round($this->trigger_price ?? 0, 3),
            'current_price'               => round($this->current_price, 3),
            'min_threshold'               => round($this->min_threshold, 3),
            'min_percent'                 => round((($this->current_price - $this->min_threshold) / $this->min_threshold) * 100, 2),
            'max_threshold'               => round($this->max_threshold, 3),
            'max_percent'                 => round((($this->max_threshold - $this->current_price) / $this->max_threshold) * 100, 2),
            'quantity'                    => $this->quantity,
            'stock'                       => $this->stock,
            'cost'                        => round($this->cost, 2),
            'avg_price'                   => $this->avg_price,
            'current_value'               => round($this->current_value, 2),
            'profit'                      => round($this->current_profit, 2),
            'current_pnl'                 => round($this->current_profit / $this->start_account * 100, 2),
            'account'                     => round($this->account, 2),
            'fees'                        => $this->fees,
            'packet_price'                => $this->packet_price,
            'min_threshold_percent_value' => round((1 - $this->min_threshold_percent_value) * 100, 1),
            'max_threshold_percent_value' => round(($this->max_threshold_percent_value - 1) * 100, 1),
            'start_account'               => $this->start_account,
            // 'potential_value'             => round($this->potential_value, 2),
            // 'potential_account'           => round($this->potential_account, 2),
            // 'potential_profit'            => round($this->potential_profit, 2),
        ];
    }
}
