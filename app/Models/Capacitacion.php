<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Capacitacion
 * 
 * @property int $id
 * @property int $id_docente
 * @property string $ies
 * @property string $nombre
 * @property Carbon $fecha
 * @property int $horas
 * @property string $descripcion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Docente $docente
 *
 * @package App\Models
 */
class Capacitacion extends Model
{
	protected $table = 'capacitacion';

	protected $casts = [
		'id_docente' => 'int',
		'fecha' => 'datetime',
		'horas' => 'int'
	];

	protected $fillable = [
		'id_docente',
		'ies',
		'nombre',
		'fecha',
		'horas',
		'descripcion'
	];

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'id_docente');
	}
}
