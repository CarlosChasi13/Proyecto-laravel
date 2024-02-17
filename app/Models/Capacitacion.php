<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacitacion extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'capacitacion';

    protected $fillable = ['id_docente','ies','nombre','fecha','horas','descripcion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docente');
    }
    
}
