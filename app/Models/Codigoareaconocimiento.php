<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codigoareaconocimiento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'codigoareaconocimiento';

    protected $fillable = ['codigo','id_grado','id_areaconocimiento'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function areaconocimiento()
    {
        return $this->hasOne('App\Models\Areaconocimiento', 'id', 'id_areaconocimiento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaturas()
    {
        return $this->hasMany('App\Models\Asignatura', 'id_codigoareaconocimiento', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docenteareaconocimientos()
    {
        return $this->hasMany('App\Models\Docenteareaconocimiento', 'id_codigoareaconocimiento', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grado()
    {
        return $this->hasOne('App\Models\Grado', 'id', 'id_grado');
    }
    
}
