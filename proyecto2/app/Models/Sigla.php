<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sigla extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sigla';

    protected $fillable = ['nombre','descripcion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function periodoacademicos()
    {
        return $this->hasMany('App\Models\Periodoacademico', 'id_sigla', 'id');
    }
    
}
