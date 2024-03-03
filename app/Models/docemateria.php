<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id_materia
 * @property int $id_docente
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Docente $docente
 * @property Materium $materium
*/
class docemateria extends Model
{
    protected $table = 'docematerias';

	protected $casts = [
		'codigo' => 'int',
		'id_materia' => 'int',
		'id_docente' => 'int'
	];

	protected $fillable = [
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

}
