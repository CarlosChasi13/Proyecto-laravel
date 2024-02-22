<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Experiencialaboral
 * 
 * @property int $id
 * @property int $id_docente
 * @property string $entidad
 * @property string $cargo
 * @property Carbon $fecha_ingreso
 * @property Carbon $fecha_salida
 * @property string $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Docente $docente
 *
 * @package App\Models
 */
class Experiencialaboral extends Model
{
	protected $table = 'experiencialaboral';

	protected $casts = [
		'id_docente' => 'int',
		'fecha_ingreso' => 'datetime',
		'fecha_salida' => 'datetime'
	];

	protected $fillable = [
		'id_docente',
		'entidad',
		'cargo',
		'fecha_ingreso',
		'fecha_salida',
		'observaciones'
	];

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'id_docente');
	}
}
