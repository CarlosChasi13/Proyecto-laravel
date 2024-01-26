<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencialaboral extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'experiencialaboral';

    protected $fillable = ['id_docente','entidad','cargo','fecha_ingreso','fecha_salida','observaciones'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docente');
    }
    
}
