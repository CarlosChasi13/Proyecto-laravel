<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'docente';

    protected $fillable = ['cedula','nombre','apellido','fecha_nacimiento','genero','telefono','email','direccion','observaciones'];
	
}
