<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function __invoke(TransactionRequest $request): Response
    {
        $pattern = "/(?P<coin>[A-Za-z]+)\s(?P<event>NO MONEY|BUY PACK|SELL PAC|BELOW|NO PACK)\sprice\s(?P<price>\d+\.\d+)\savg\s(?P<avg>-?\d+\.\d+)\sstock\s(?P<stock>\d+\.\d+)\scost\s(?P<cost>\d+\.\d+)\smin\s(?P<min>\d+\.\d+)\smax\s(?P<max>\d+\.\d+)\spack\s(?P<pack>\d+)\sacc\s(?P<acc>\d+\.\d+)(?:\stotal\s(?P<total>\d+\.\d+))?(?:\squan\s(?P<quan>\d+\.\d+))?/";

        if (preg_match($pattern, trim($request->message), $matches)) {
            Transaction::query()->create([
                'coin'          => trim($matches['coin']),
                'event'         => trim($matches['event']),
                'price'         => $matches['price'],
                'average'       => $matches['avg'],
                'stock'         => $matches['stock'],
                'cost'          => $matches['cost'],
                'min_threshold' => $matches['min'],
                'max_threshold' => $matches['max'],
                'package_count' => $matches['pack'],
                'account'       => $matches['acc'],
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
