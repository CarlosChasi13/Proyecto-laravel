<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sede
 *
 * @property int $id
 * @property string $nombre
 * @property string $telefono
 * @property string $email
 * @property string $direccion
 * @property string $ciudad
 * @property int $id_provincia
 * @property int $id_pais
 * @property string $maps_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Pai $pai
 * @property Provincium $provincium
 * @property Collection|Nrc[] $nrcs
 *
 * @package App\Models
 */
class Sede extends Model
{
	protected $table = 'sede';

	protected $casts = [
		'id_provincia' => 'int',
		'id_pais' => 'int'
	];

	protected $fillable = [
		'nombre',
		'telefono',
		'email',
		'direccion',
		'ciudad',
		'id_provincia',
		'id_pais',
		'maps_url'
	];

	public function pai()
	{
		return $this->belongsTo(Pais::class, 'id_pais');
	}

	public function provincium()
	{
		return $this->belongsTo(Provincia::class, 'id_provincia');
	}

	public function nrcs()
	{
		return $this->hasMany(Nrc::class, 'id_sede');
	}
}
