<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docenteareaconocimiento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'docenteareaconocimiento';

    protected $fillable = ['id_docente','id_codigoareaconocimiento'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function codigoareaconocimiento()
    {
        return $this->hasOne('App\Models\Codigoareaconocimiento', 'id', 'id_codigoareaconocimiento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente', 'id', 'id_docente');
    }
    
}
