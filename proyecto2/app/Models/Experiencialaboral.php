<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencialaboral extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'experiencialaborals';

    protected $fillable = ['entidad','cargo','fecha_ingreso','fecha_salida','observacion','id_docente'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docente');
    }
    
}
