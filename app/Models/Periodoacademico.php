<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Periodoacademico
 *
 * @property int $id
 * @property int $id_grado
 * @property int $id_sigla
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Grado $grado
 * @property Sigla $sigla
 * @property Collection|Nrc[] $nrcs
 *
 * @package App\Models
 */
class Periodoacademico extends Model
{
	protected $table = 'periodoacademico';

	protected $casts = [
		'id_grado' => 'int',
		'id_sigla' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime'
	];

	protected $fillable = [
		'id_grado',
		'id_sigla',
		'fecha_inicio',
		'fecha_fin'
	];

	public function grado()
	{
		return $this->belongsTo(Grado::class, 'id_grado');
	}

	public function sigla()
	{
		return $this->belongsTo(Sigla::class, 'id_sigla');
	}

	public function nrcs()
	{
		return $this->hasMany(Nrc::class, 'id_periodoacademico');
	}

    public function getPeriodoCompletoAttribute()
    {
        return $this->grado->nombre . ' ' . $this->sigla->nombre . ' ' . $this->fecha_inicio->format('M-Y') . ' ' . $this->fecha_fin->format('M-Y');
    }
}
