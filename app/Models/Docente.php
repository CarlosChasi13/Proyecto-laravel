<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Docente
 *
 * @property int $id
 * @property string $codigo
 * @property string $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string|null $foto_personal
 * @property Carbon $fecha_nacimiento
 * @property int $id_genero
 * @property string $telefono
 * @property string $email
 * @property string $direccion
 * @property string $acercade
 * @property string $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Genero $genero
 * @property Collection|Areaintere[] $areainteres
 * @property Collection|Capacitacion[] $capacitacions
 * @property Collection|Docenteareaconocimiento[] $docenteareaconocimientos
 * @property Collection|Experiencialaboral[] $experiencialaborals
 * @property Collection|Nrc[] $nrcs
 * @property Collection|Publicacioncientifica[] $publicacioncientificas
 * @property Collection|Titulo[] $titulos
 *
 * @package App\Models
 */
class Docente extends Model
{
	protected $table = 'docente';

	protected $casts = [
		'fecha_nacimiento' => 'datetime',
		'id_genero' => 'int'
	];

	protected $fillable = [
		'codigo',
		'cedula',
		'nombre',
		'apellido',
		'foto_personal',
		'fecha_nacimiento',
		'id_genero',
		'telefono',
		'email',
		'direccion',
		'acercade',
		'observaciones'
	];

	public function genero()
	{
		return $this->belongsTo(Genero::class, 'id_genero');
	}

	public function areainteres()
	{
		return $this->hasMany(Areainteres::class, 'id_docente');
	}

	public function capacitaciones()
	{
		return $this->hasMany(Capacitacion::class, 'id_docente');
	}

	public function docenteareaconocimientos()
	{
		return $this->hasMany(Docenteareaconocimiento::class, 'id_docente');
	}

	public function experiencialaborales()
	{
		return $this->hasMany(Experiencialaboral::class, 'id_docente');
	}

	public function nrcs()
	{
		return $this->hasMany(Nrc::class, 'id_docente');
	}

	public function publicacioncientificas()
	{
		return $this->hasMany(Publicacioncientifica::class, 'id_docente');
	}

	public function titulos()
	{
		return $this->hasMany(Titulo::class, 'id_docente');
	}


	


}
