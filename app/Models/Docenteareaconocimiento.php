<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Docenteareaconocimiento
 *
 * @property int $id
 * @property int $id_docente
 * @property int $id_codigoareaconocimiento
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Codigoareaconocimiento $codigoareaconocimiento
 * @property Docente $docente
 *
 * @package App\Models
 */
class Docenteareaconocimiento extends Model
{
	protected $table = 'docenteareaconocimiento';

	protected $casts = [
		'id_docente' => 'int',
		'id_codigoareaconocimiento' => 'int'
	];

	protected $fillable = [
		'id_docente',
		'id_codigoareaconocimiento'
	];

	public function codigoareaconocimiento()
	{
		return $this->belongsTo(Codigoareaconocimiento::class, 'id_codigoareaconocimiento');
	}

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'id_docente');
	}

    public function getAreaNamesAttribute()
    {
        return $this->codigoareaconocimiento;
    }
}
