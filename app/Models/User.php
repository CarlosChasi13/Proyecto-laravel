<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string|null $last_name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property Carbon|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $id_docente
 *
 * @property Docente|null $docente
 *
 * @package App\Models
 */
class User extends Authenticatable implements FilamentUser
{
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'two_factor_confirmed_at' => 'datetime',
		'current_team_id' => 'int',
		'id_docente' => 'int'
	];

	protected $hidden = [
		'password',
		'two_factor_secret',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'last_name',
		'email',
		'email_verified_at',
		'password',
		'two_factor_secret',
		'two_factor_recovery_codes',
		'two_factor_confirmed_at',
		'remember_token',
		'current_team_id',
		'profile_photo_path',
		'id_docente'
	];

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'id_docente');
	}

    public function canAccessPanel(Panel $panel): bool
    {
        /* return str_ends_with($this->email, '@gmail.com') && $this->hasVerifiedEmail(); */
        return str_ends_with($this->email, '@gmail.com');
    }
}
