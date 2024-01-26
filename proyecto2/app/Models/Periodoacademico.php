<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodoacademico extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'periodoacademico';

    protected $fillable = ['id_grado','id_sigla','fecha_inicio','fecha_fin'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaturas()
    {
        return $this->hasMany('App\Models\Asignatura', 'id_periodoacademico', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grado()
    {
        return $this->hasOne('App\Models\Grado', 'id', 'id_grado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sigla()
    {
        return $this->hasOne('App\Models\Sigla', 'id', 'id_sigla');
    }
    
}
