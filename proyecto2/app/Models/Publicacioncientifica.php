<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacioncientifica extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'publicacioncientificas';

    protected $fillable = ['doi','titulo','anio','ies','autor','id_docente'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docente');
    }
    
}
