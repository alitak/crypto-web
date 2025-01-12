<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

/**
 * @mixin IdeHelperWallet
 */
class Wallet extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $table = 'wallets';

    protected $guarded = [];

    #[Override]
    protected function casts(): array
    {
        return [
            'package_count'               => 'int',
            'trigger_price'               => 'float',
            'current_price'               => 'float',
            'min_threshold'               => 'float',
            'max_threshold'               => 'float',
            'quantity'                    => 'float',
            'stock'                       => 'float',
            'cost'                        => 'float',
            'avg_price'                   => 'float',
            'account'                     => 'float',
            'fees'                        => 'float',
            'packet_price'                => 'int',
            'min_threshold_percent_value' => 'float',
            'max_threshold_percent_value' => 'float',
            'start_account'               => 'int',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS & MUTATORS
    |--------------------------------------------------------------------------
    */
}
