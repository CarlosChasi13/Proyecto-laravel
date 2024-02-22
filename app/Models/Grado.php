<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Grado
 * 
 * @property int $id
 * @property string $nombre
 * 
 * @property Collection|Codigoareaconocimiento[] $codigoareaconocimientos
 * @property Collection|Periodoacademico[] $periodoacademicos
 *
 * @package App\Models
 */
class Grado extends Model
{
	protected $table = 'grado';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function codigoareaconocimientos()
	{
		return $this->hasMany(Codigoareaconocimiento::class, 'id_grado');
	}

	public function periodoacademicos()
	{
		return $this->hasMany(Periodoacademico::class, 'id_grado');
	}
}
