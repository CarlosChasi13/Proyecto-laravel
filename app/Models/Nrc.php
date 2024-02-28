<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nrc
 *
 * @property int $id
 * @property int $id_sede
 * @property int $id_periodoacademico
 * @property int $codigo
 * @property int $id_materia
 * @property int $id_docente
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Docente $docente
 * @property Materium $materium
 * @property Periodoacademico $periodoacademico
 * @property Sede $sede
 *
 * @package App\Models
 */
class Nrc extends Model
{
	protected $table = 'nrc';

	protected $casts = [
		'id_sede' => 'int',
		'id_periodoacademico' => 'int',
		'codigo' => 'int',
		'id_materia' => 'int',
		'id_docente' => 'int'
	];

	protected $fillable = [
		'id_sede',
		'id_periodoacademico',
		'codigo',
		'id_materia',
		'id_docente'
	];

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'id_docente');
	}

	public function materia()
	{
		return $this->belongsTo(Materia::class, 'id_materia');
	}

	public function periodoacademico()
	{
		return $this->belongsTo(Periodoacademico::class, 'id_periodoacademico');
	}

	public function sede()
	{
		return $this->belongsTo(Sede::class, 'id_sede');
	}
}
