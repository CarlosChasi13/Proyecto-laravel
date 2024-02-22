<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sigla
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property Collection|Periodoacademico[] $periodoacademicos
 *
 * @package App\Models
 */
class Sigla extends Model
{
	protected $table = 'sigla';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function periodoacademicos()
	{
		return $this->hasMany(Periodoacademico::class, 'id_sigla');
	}
}
