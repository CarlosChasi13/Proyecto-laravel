<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'titulo';

    protected $fillable = ['id_docente','fecha','ies','nombre','observaciones','principal'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docente');
    }
    
}
