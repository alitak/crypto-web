<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $fcm_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FcmToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FcmToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FcmToken query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FcmToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FcmToken whereFcmToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FcmToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FcmToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FcmToken whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFcmToken {}
}

namespace App\Models{
/**
 * 
 *
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
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTransaction {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FcmToken> $fcmTokens
 * @property-read int|null $fcm_tokens_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $coin
 * @property int $package_count
 * @property float|null $trigger_price
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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereTriggerPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperWallet {}
}

