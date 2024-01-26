<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'grado';

    protected $fillable = ['nombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function codigoareaconocimientos()
    {
        return $this->hasMany('App\Models\Codigoareaconocimiento', 'id_grado', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function periodoacademicos()
    {
        return $this->hasMany('App\Models\Periodoacademico', 'id_grado', 'id');
    }
    
}
