<?php

declare(strict_types=1);

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class WalletRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'data'                               => ['required', 'array'],
            'data.*.package_count'               => ['required', 'numeric'],
            'data.*.current_price'               => ['required', 'numeric'],
            'data.*.min_threshold'               => ['required', 'numeric'],
            'data.*.max_threshold'               => ['required', 'numeric'],
            'data.*.quantity'                    => ['required', 'numeric'],
            'data.*.stock'                       => ['required', 'numeric'],
            'data.*.cost'                        => ['required', 'numeric'],
            'data.*.avg_price'                   => ['required', 'numeric'],
            'data.*.account'                     => ['required', 'numeric'],
            'data.*.fees'                        => ['required', 'numeric'],
            'data.*.packet_price'                => ['required', 'numeric'],
            'data.*.min_threshold_percent_value' => ['required', 'numeric'],
            'data.*.max_threshold_percent_value' => ['required', 'numeric'],
            'data.*.start_account'               => ['required', 'numeric'],
            'data.*.coin'                        => ['required', 'string'],
        ];
    }
}
