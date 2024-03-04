<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Materium
 *
 * @property int $id
 * @property string $codigo
 * @property int $id_codigoareaconocimiento
 * @property string $nombre
 * @property string $descripcion
 * @property int $horas_teoria
 * @property int $horas_laboratorio
 * @property int $horas_otros
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Codigoareaconocimiento $codigoareaconocimiento
 * @property Collection|Nrc[] $nrcs
 *
 * @package App\Models
 */
class Materia extends Model
{
	protected $table = 'materia';

	protected $casts = [
		'id_codigoareaconocimiento' => 'int',
		'horas_teoria' => 'int',
		'horas_laboratorio' => 'int',
		'horas_otros' => 'int'
	];

	protected $fillable = [
		'codigo',
		'id_codigoareaconocimiento',
		'nombre',
		'descripcion',
		'horas_teoria',
		'horas_laboratorio',
		'horas_otros'
	];

	public function codigoareaconocimiento()
	{
		return $this->belongsTo(Codigoareaconocimiento::class, 'id_codigoareaconocimiento');
	}

	public function nrcs()
	{
		return $this->hasMany(Nrc::class, 'id_materia');
	}
//
	public function materia(): BelongsTo
	{
		return $this->belongsTo(Codigoareaconocimiento::class, 'id_codigoareaconocimiento');
	}

}
