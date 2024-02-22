<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Genero
 * 
 * @property int $id
 * @property string $nombre
 * 
 * @property Collection|Docente[] $docentes
 *
 * @package App\Models
 */
class Genero extends Model
{
	protected $table = 'genero';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function docentes()
	{
		return $this->hasMany(Docente::class, 'id_genero');
	}
}
