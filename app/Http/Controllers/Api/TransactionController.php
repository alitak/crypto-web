<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TransactionRequest;
use App\Http\Requests\Api\UpdateTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class
TransactionController extends Controller
{
    public function __invoke(TransactionRequest $request): Response
    {
        $pattern = '/(?<coin>[A-Z]+)\s+(?<event>[A-Z]+).*?price\s+(?<price>\d+\.\d+).*?avg\s+(?<average>\d+\.\d+).*?stock\s+(?<stock>\d+\.\d+).*?cost\s+(?<cost>\d+\.\d+).*?min\s+(?<min_threshold>\d+\.\d+).*?max\s+(?<max_threshold>\d+\.\d+).*?pack\s+(?<package_count>\d+).*?acc\s+(?<account>\d+\.\d+).*?total\s+(?<total>\d+\.\d+).*?quan\s+(?<quantity>\d+\.\d+)/';

        if (preg_match($pattern, $request->message, $matches)) {
            Transaction::query()->create([
                'coin'          => $matches['coin'],
                'event'         => $matches['event'],
                'price'         => $matches['price'],
                'average'       => $matches['average'],
                'stock'         => $matches['stock'],
                'cost'          => $matches['cost'],
                'min_threshold' => $matches['min_threshold'],
                'max_threshold' => $matches['max_threshold'],
                'package_count' => $matches['package_count'],
                'account'       => $matches['account'],
                'total'         => $matches['total'] ?? null,
                'quantity'      => $matches['quantity'] ?? null,
                'happened_at'   => Carbon::createFromFormat('YmdHi', $request->happened_at, 'UTC')
                    ->setTimezone(config('app.timezone'))
                    ->format('Y-m-d H:i:s'),
            ]);
        }
        return response()->noContent();
    }
}
