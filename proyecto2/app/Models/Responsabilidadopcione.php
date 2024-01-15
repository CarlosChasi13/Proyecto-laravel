<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsabilidadopcione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'responsabilidadopciones';

    protected $fillable = ['cargo','descripcion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responsabilidads()
    {
        return $this->hasMany('App\Models\Responsabilidad', 'id_responsabilidad', 'id');
    }
    
}
