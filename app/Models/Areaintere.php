<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areaintere extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'areainteres';

    protected $fillable = ['id_docente','id_areaconocimiento','tema','descripcion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function areaconocimiento()
    {
        return $this->hasOne('App\Models\Areaconocimiento', 'id', 'id_areaconocimiento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docente');
    }
    
}
