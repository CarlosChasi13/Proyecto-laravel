<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'docente';

    protected $fillable = ['cedula','nombre','apellido','foto_personal','fecha_nacimiento','id_genero','telefono','email','direccion','id_rol','acercade','observaciones'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areainteres()
    {
        return $this->hasMany('App\Models\Areaintere', 'id_docente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function capacitaciones()
    {
        return $this->hasMany('App\Models\Capacitacion', 'id_docente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docenteareaconocimientos()
    {
        return $this->hasMany('App\Models\Docenteareaconocimiento', 'id_docente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiencialaborals()
    {
        return $this->hasMany('App\Models\Experiencialaboral', 'id_docente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function genero()
    {
        return $this->hasOne('App\Models\Genero', 'id', 'id_genero');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nrcs()
    {
        return $this->hasMany('App\Models\Nrc', 'id_docente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publicacioncientificas()
    {
        return $this->hasMany('App\Models\Publicacioncientifica', 'id_docente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rol()
    {
        return $this->hasOne('App\Models\Rol', 'id', 'id_rol');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function titulos()
    {
        return $this->hasMany('App\Models\Titulo', 'id_docente', 'id');
    }
    
}
