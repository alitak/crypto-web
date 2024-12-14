<?php

declare(strict_types=1);

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class FcmTokenRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fcm_token' => ['required', 'string'],
        ];
    }
}
