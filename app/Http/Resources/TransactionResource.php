<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'coin'          => $this->coin,
            'event'         => $this->event,
            'price'         => sprintf('%10.3f', $this->price),
            'average'       => sprintf('%10.3f', $this->average),
            'stock'         => sprintf('%9.5f', $this->stock),
            'cost'          => sprintf('%7.3f', $this->cost),
            'min_threshold' => sprintf('%10.3f', $this->min_threshold),
            'max_threshold' => sprintf('%10.3f', $this->max_threshold),
            'package_count' => $this->package_count,
            'account'       => sprintf('%7.3f', $this->account),
            'total'         => sprintf('%7.3f', $this->total),
            'quantity'      => sprintf('%8.5f', $this->quantity),
            'happened_at'   => $this->happened_at->format('Y. F d. H:i'),
        ];
    }
}
