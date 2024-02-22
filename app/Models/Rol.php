<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property Collection|Docente[] $docentes
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function docentes()
	{
		return $this->hasMany(Docente::class, 'id_rol');
	}
}
