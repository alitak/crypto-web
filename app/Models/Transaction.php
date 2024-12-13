<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $coin
 * @property string $event
 * @property string $price
 * @property string $average
 * @property string $stock
 * @property string $cost
 * @property string $min_threshold
 * @property string $max_threshold
 * @property int $package_count
 * @property string $account
 * @property string|null $total
 * @property string|null $quantity
 * @property \Illuminate\Support\Carbon $happened_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAverage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCoin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereHappenedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereMaxThreshold($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereMinThreshold($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction wherePackageCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUpdatedAt($value)
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
class Transaction extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $table = 'transactions';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'happened_at' => 'datetime',
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
