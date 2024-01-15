<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'rols';

    protected $fillable = ['descripcion','id_docente','id_rol'];
	
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
    public function rolopcione()
    {
        return $this->hasOne('App\Models\Rolopcione', 'id', 'id_rol');
    }
    
}
