<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        $page = request()->input('page', 1);
        $per_page = request()->input('per_page', 10);

        return Inertia::render('Transactions/Index', [
            'transactions' => Inertia::merge(
                TransactionResource::collection(
                    Transaction::query()->latest('happened_at')->paginate($per_page, page: $page)
                ),
            ),
        ]);
    }
}
