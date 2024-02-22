<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Publicacioncientifica
 * 
 * @property int $id
 * @property int $id_docente
 * @property string $nombre
 * @property Carbon $año
 * @property string $ies
 * @property string $observaciones
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Docente $docente
 *
 * @package App\Models
 */
class Publicacioncientifica extends Model
{
	protected $table = 'publicacioncientifica';

	protected $casts = [
		'id_docente' => 'int',
		'año' => 'datetime'
	];

	protected $fillable = [
		'id_docente',
		'nombre',
		'año',
		'ies',
		'observaciones'
	];

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'id_docente');
	}
}
