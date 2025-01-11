<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WalletRequest;
use App\Models\Wallet;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    public function __invoke(WalletRequest $request): Response
    {
        foreach ($request->data as $data) {
            $data['coin'] = Str::of($data['coin'])->replace('USDC', '')->upper()->toString();
            Wallet::query()->updateOrCreate(['coin' => $data['coin']], Arr::except($data, 'coin'));
        }

        return response()->noContent();
    }
}
