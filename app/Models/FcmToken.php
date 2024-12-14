<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property string $fcm_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 *
 * @method static Builder<static>|FcmToken newModelQuery()
 * @method static Builder<static>|FcmToken newQuery()
 * @method static Builder<static>|FcmToken query()
 * @method static Builder<static>|FcmToken whereCreatedAt($value)
 * @method static Builder<static>|FcmToken whereFcmToken($value)
 * @method static Builder<static>|FcmToken whereId($value)
 * @method static Builder<static>|FcmToken whereUpdatedAt($value)
 * @method static Builder<static>|FcmToken whereUserId($value)
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 */
class FcmToken extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $table = 'fcm_tokens';

    protected $guarded = [];

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
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

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
