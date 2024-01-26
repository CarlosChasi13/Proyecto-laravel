<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paisop extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'paisop';

    protected $fillable = ['nombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sedes()
    {
        return $this->hasMany('App\Models\Sede', 'id_pais', 'id');
    }
    
}
