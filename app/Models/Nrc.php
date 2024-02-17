<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nrc extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'nrc';

    protected $fillable = ['id_sede','id_asignatura','id_docente'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function asignatura()
    {
        return $this->hasOne('App\Models\Asignatura', 'id', 'id_asignatura');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sede()
    {
        return $this->hasOne('App\Models\Sede', 'id', 'id_sede');
    }
    
}
