<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nrc extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'nrc';

    protected $fillable = ['nrc','id_campus','id_departamento','id_materia','id_docentes','id_periodoacademico'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function campu()
    {
        return $this->hasOne('App\Models\Campu', 'id', 'id_campus');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'id', 'id_departamento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docentes');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function materia()
    {
        return $this->hasOne('App\Models\Materia', 'id', 'id_materia');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function periodosacademico()
    {
        return $this->hasOne('App\Models\Periodosacademico', 'id', 'id_periodoacademico');
    }
    
}
