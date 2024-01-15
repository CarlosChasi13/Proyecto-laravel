<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsabilidad extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'responsabilidad';

    protected $fillable = ['id_docente','id_responsabilidad'];
	
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
    public function responsabilidadopcione()
    {
        return $this->hasOne('App\Models\Responsabilidadopcione', 'id', 'id_responsabilidad');
    }
    
}
