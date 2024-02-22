<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Areaconocimiento
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Collection|Areaintere[] $areainteres
 * @property Collection|Codigoareaconocimiento[] $codigoareaconocimientos
 *
 * @package App\Models
 */
class Areaconocimiento extends Model
{
	protected $table = 'areaconocimiento';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function areainteres()
	{
		return $this->hasMany(Areainteres::class, 'id_areaconocimiento');
	}

	public function codigoareaconocimientos()
	{
		return $this->hasMany(Codigoareaconocimiento::class, 'id_areaconocimiento');
	}
}
