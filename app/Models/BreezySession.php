<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BreezySession
 * 
 * @property int $id
 * @property string $authenticatable_type
 * @property int $authenticatable_id
 * @property string|null $panel_id
 * @property string|null $guard
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property Carbon|null $expires_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property Carbon|null $two_factor_confirmed_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class BreezySession extends Model
{
	protected $table = 'breezy_sessions';

	protected $casts = [
		'authenticatable_id' => 'int',
		'expires_at' => 'datetime',
		'two_factor_confirmed_at' => 'datetime'
	];

	protected $hidden = [
		'two_factor_secret'
	];

	protected $fillable = [
		'authenticatable_type',
		'authenticatable_id',
		'panel_id',
		'guard',
		'ip_address',
		'user_agent',
		'expires_at',
		'two_factor_secret',
		'two_factor_recovery_codes',
		'two_factor_confirmed_at'
	];
}
