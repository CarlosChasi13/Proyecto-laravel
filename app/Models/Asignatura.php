<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'asignatura';

    protected $fillable = ['id_periodoacademico','id_codigoareaconocimiento','codigo','nombre','descripcion','horas_teoria','horas_laboratorio','horas_otros'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function codigoareaconocimiento()
    {
        return $this->hasOne('App\Models\Codigoareaconocimiento', 'id', 'id_codigoareaconocimiento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nrcs()
    {
        return $this->hasMany('App\Models\Nrc', 'id_asignatura', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function periodoacademico()
    {
        return $this->hasOne('App\Models\Periodoacademico', 'id', 'id_periodoacademico');
    }
    
}
