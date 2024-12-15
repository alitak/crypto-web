<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $coin
 * @property int $package_count
 * @property float $current_price
 * @property float $min_threshold
 * @property float $max_threshold
 * @property float $quantity
 * @property float $stock
 * @property float $cost
 * @property float $avg_price
 * @property float $account
 * @property float $fees
 * @property int $packet_price
 * @property float $min_threshold_percent_value
 * @property float $max_threshold_percent_value
 * @property int $start_account
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereAvgPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereCoin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereCurrentPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereMaxThreshold($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereMaxThresholdPercentValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereMinThreshold($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereMinThresholdPercentValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet wherePackageCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet wherePacketPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereStartAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereUpdatedAt($value)
 *
 * @mixin \Illuminate\Database\Eloquent\Model
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

    protected function casts(): array
    {
        return [
            'package_count'               => 'int',
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
