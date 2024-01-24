<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'docente';

    protected $fillable = ['cedula','nombre','apellido','fecha_nacimiento','id_genero','foto_personal','genero','telefono','email','direccion','acercade','observaciones'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areadeconocimientos()
    {
        return $this->hasMany('App\Models\Areadeconocimiento', 'id_docente', 'id');
    }
    
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
    public function capacitacions()
    {
        return $this->hasMany('App\Models\Capacitacion', 'id_docente', 'id');
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
        return $this->hasMany('App\Models\Nrc', 'id_docentes', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publicacioncientificas()
    {
        return $this->hasMany('App\Models\Publicacioncientifica', 'id_docente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responsabilidads()
    {
        return $this->hasMany('App\Models\Responsabilidad', 'id_docente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rols()
    {
        return $this->hasMany('App\Models\Rol', 'id_docente', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function titulos()
    {
        return $this->hasMany('App\Models\Titulo', 'id_docente', 'id');
    }
    
}
