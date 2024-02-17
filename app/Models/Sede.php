<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sede';

    protected $fillable = ['nombre','telefono','email','direccion','ciudad','id_provincia','id_pais','maps_url'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nrcs()
    {
        return $this->hasMany('App\Models\Nrc', 'id_sede', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paisop()
    {
        return $this->hasOne('App\Models\Paisop', 'id', 'id_pais');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provinciaop()
    {
        return $this->hasOne('App\Models\Provinciaop', 'id', 'id_provincia');
    }
    
}
