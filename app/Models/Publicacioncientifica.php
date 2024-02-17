<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacioncientifica extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'publicacioncientifica';

    protected $fillable = ['id_docente','nombre','año','ies','observaciones'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docente');
    }
    
}
