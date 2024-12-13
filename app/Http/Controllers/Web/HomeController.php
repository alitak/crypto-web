<?php

declare(strict_types=1);


namespace App\Http\Controllers\Web;

use Inertia\Inertia;
use Inertia\Response;

class HomeController
{
    public function __invoke(): Response
    {
        return Inertia::render('Home');
    }
}
