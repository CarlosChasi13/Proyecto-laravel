<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Titulo
 * 
 * @property int $id
 * @property int $id_docente
 * @property Carbon $fecha
 * @property string $ies
 * @property string $nombre
 * @property string $observaciones
 * @property bool $principal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Docente $docente
 *
 * @package App\Models
 */
class Titulo extends Model
{
	protected $table = 'titulo';

	protected $casts = [
		'id_docente' => 'int',
		'fecha' => 'datetime',
		'principal' => 'bool'
	];

	protected $fillable = [
		'id_docente',
		'fecha',
		'ies',
		'nombre',
		'observaciones',
		'principal'
	];

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'id_docente');
	}
}
