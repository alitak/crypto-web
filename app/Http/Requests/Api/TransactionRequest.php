<?php

declare(strict_types=1);

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'happened_at' => ['required', 'date'],
            'message'     => ['required', 'string'],
        ];
    }
}
