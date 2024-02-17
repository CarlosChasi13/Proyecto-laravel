<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'rol';

    protected $fillable = ['nombre','descripcion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function docentes()
    {
        return $this->hasMany('App\Models\Docente', 'id_rol', 'id');
    }
    
}
