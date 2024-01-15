<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'materias';

    protected $fillable = ['codigo','curso','nombre','descripcion','horas_creditos','horas_teoria','horas_laboratorio','horas_otros','id_cursos'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'id_cursos');
    }
    
}
