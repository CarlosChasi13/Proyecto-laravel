<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Codigoareaconocimiento
 *
 * @property int $id
 * @property string $codigo
 * @property int $id_grado
 * @property int $id_areaconocimiento
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Areaconocimiento $areaconocimiento
 * @property Grado $grado
 * @property Collection|Docenteareaconocimiento[] $docenteareaconocimientos
 * @property Collection|Materium[] $materia
 *
 * @package App\Models
 */
class Codigoareaconocimiento extends Model
{
	protected $table = 'codigoareaconocimiento';

	protected $casts = [
		'id_grado' => 'int',
		'id_areaconocimiento' => 'int'
	];

	protected $fillable = [
		'codigo',
		'id_grado',
		'id_areaconocimiento'
	];

	public function areaconocimiento()
	{
		return $this->belongsTo(Areaconocimiento::class, 'id_areaconocimiento');
	}

	public function grado()
	{
		return $this->belongsTo(Grado::class, 'id_grado');
	}

	public function docenteareaconocimientos()
	{
		return $this->hasMany(Docenteareaconocimiento::class, 'id_codigoareaconocimiento');
	}

	public function materias()
	{
		return $this->hasMany(Materia::class, 'id_codigoareaconocimiento');
	}
}
