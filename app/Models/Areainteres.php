<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Areaintere
 *
 * @property int $id
 * @property int $id_docente
 * @property int $id_areaconocimiento
 * @property string $tema
 * @property string $descripcion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Areaconocimiento $areaconocimiento
 * @property Docente $docente
 *
 * @package App\Models
 */
class Areainteres extends Model
{
	protected $table = 'areainteres';

	protected $casts = [
		'id_docente' => 'int',
		'id_areaconocimiento' => 'int'
	];

	protected $fillable = [
		'id_docente',
		'id_areaconocimiento',
		'tema',
		'descripcion'
	];

	public function areaconocimiento()
	{
		return $this->belongsTo(Areaconocimiento::class, 'id_areaconocimiento');
	}

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'id_docente');
	}
}
