<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\FcmTokenRequest;
use App\Models\User;
use Illuminate\Http\Response;

class FcmTokenController extends Controller
{
    public function __invoke(FcmTokenRequest $request): Response
    {
        User::query()->first()->fcmTokens()->updateOrCreate(
            ['fcm_token' => $request->fcm_token],
        );

        return response()->noContent();
    }
}
